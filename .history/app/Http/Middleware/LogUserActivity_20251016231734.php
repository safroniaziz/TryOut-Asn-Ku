<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\ActivityLogService;
use Symfony\Component\HttpFoundation\Response;

class LogUserActivity
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        // Only log for authenticated users
        if (Auth::check()) {
            $user = Auth::user();
            $route = $request->route();
            
            // Skip logging for certain routes to avoid spam
            $skipRoutes = [
                'logout',
                'sanctum.csrf-cookie',
                'livewire.message',
                'horizon.*',
                'debugbar.*'
            ];

            $routeName = $route ? $route->getName() : null;
            
            // Check if we should skip this route
            $shouldSkip = false;
            foreach ($skipRoutes as $skipPattern) {
                if (fnmatch($skipPattern, $routeName)) {
                    $shouldSkip = true;
                    break;
                }
            }

            // Log significant activities
            if (!$shouldSkip && $this->shouldLogActivity($request, $routeName)) {
                $this->logActivity($request, $user, $routeName, $response);
            }
        }

        return $response;
    }

    /**
     * Determine if we should log this activity
     */
    private function shouldLogActivity(Request $request, ?string $routeName): bool
    {
        // Log specific routes
        $importantRoutes = [
            'dashboard',
            'profile.edit',
            'profile.update',
            'tryout.*',
            'leaderboard.*',
            'subscription.*'
        ];

        foreach ($importantRoutes as $pattern) {
            if (fnmatch($pattern, $routeName)) {
                return true;
            }
        }

        // Log POST, PUT, PATCH, DELETE requests
        if (in_array($request->method(), ['POST', 'PUT', 'PATCH', 'DELETE'])) {
            return true;
        }

        return false;
    }

    /**
     * Log the activity
     */
    private function logActivity(Request $request, $user, ?string $routeName, Response $response): void
    {
        $properties = [
            'route' => $routeName,
            'url' => $request->fullUrl(),
            'method' => $request->method(),
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'response_status' => $response->getStatusCode()
        ];

        // Add request data for non-GET requests
        if (!$request->isMethod('GET')) {
            $properties['request_data'] = $this->filterSensitiveData($request->all());
        }

        // Use our ActivityLogService for consistency
        $description = $this->getActivityDescription($request, $routeName);
        ActivityLogService::logAuthenticatedActivity($user, $description, $properties);
    }

    /**
     * Filter sensitive data from request
     */
    private function filterSensitiveData(array $data): array
    {
        $sensitiveFields = ['password', 'password_confirmation', 'otp_code', 'token', '_token'];
        
        foreach ($sensitiveFields as $field) {
            if (isset($data[$field])) {
                $data[$field] = '[FILTERED]';
            }
        }

        return $data;
    }

    /**
     * Get a meaningful description for the activity
     */
    private function getActivityDescription(Request $request, ?string $routeName): string
    {
        $actionMap = [
            'dashboard' => 'Viewed Dashboard',
            'profile.edit' => 'Viewed Profile Edit Page',
            'profile.update' => 'Updated Profile',
            'tryouts.index' => 'Viewed Tryouts List',
            'tryouts.show' => 'Viewed Tryout Details',
            'tryouts.start' => 'Started Tryout',
            'tryouts.submit' => 'Submitted Tryout',
            'leaderboard' => 'Viewed Leaderboard',
            'subscription.index' => 'Viewed Subscriptions',
            'subscription.create' => 'Created Subscription',
        ];

        if ($routeName && isset($actionMap[$routeName])) {
            return $actionMap[$routeName];
        }

        // Fallback to method + route or URL
        $method = ucfirst(strtolower($request->method()));
        return $routeName ? "{$method} {$routeName}" : "{$method} {$request->getPathInfo()}";
    }
}
