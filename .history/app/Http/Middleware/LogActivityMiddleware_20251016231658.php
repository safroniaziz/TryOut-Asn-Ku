<?php

namespace App\Http\Middleware;

use App\Services\ActivityLogService;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class LogActivityMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        // Only log for authenticated users and successful responses
        if (Auth::check() && $response->getStatusCode() < 400) {
            $this->logActivity($request);
        }

        return $response;
    }

    /**
     * Log the user activity
     */
    private function logActivity(Request $request): void
    {
        $user = Auth::user();
        $action = $this->determineAction($request);
        
        // Skip logging for certain routes that shouldn't be tracked
        if ($this->shouldSkipLogging($request, $action)) {
            return;
        }

        $properties = [
            'url' => $request->fullUrl(),
            'method' => $request->method(),
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'parameters' => $this->sanitizeParameters($request->all()),
        ];

        ActivityLogService::logAuthenticatedActivity(
            $user,
            $action,
            $properties
        );
    }

    /**
     * Determine the action based on the request
     */
    private function determineAction(Request $request): string
    {
        $route = $request->route();
        $routeName = $route ? $route->getName() : null;
        $uri = $request->getPathInfo();

        // Map route names to meaningful actions
        $actionMap = [
            'dashboard' => 'Viewed Dashboard',
            'tryouts.index' => 'Viewed Tryouts List',
            'tryouts.show' => 'Viewed Tryout Details',
            'tryouts.start' => 'Started Tryout',
            'tryouts.submit' => 'Submitted Tryout',
            'profile.edit' => 'Viewed Profile Edit',
            'profile.update' => 'Updated Profile',
            'leaderboard' => 'Viewed Leaderboard',
            'subscription.index' => 'Viewed Subscriptions',
            'subscription.create' => 'Created Subscription',
        ];

        if ($routeName && isset($actionMap[$routeName])) {
            return $actionMap[$routeName];
        }

        // Fallback to HTTP method + URI
        return ucfirst(strtolower($request->method())) . ' ' . $uri;
    }

    /**
     * Check if we should skip logging for this request
     */
    private function shouldSkipLogging(Request $request, string $action): bool
    {
        $skipRoutes = [
            'logout',
            'sanctum/csrf-cookie',
            '_ignition',
            'livewire',
        ];

        $skipPatterns = [
            '/api/ping',
            '/health',
            '/assets/',
            '/css/',
            '/js/',
            '/images/',
            '/storage/',
        ];

        $uri = $request->getPathInfo();
        $routeName = $request->route() ? $request->route()->getName() : null;

        // Skip specific routes
        if ($routeName && in_array($routeName, $skipRoutes)) {
            return true;
        }

        // Skip patterns
        foreach ($skipPatterns as $pattern) {
            if (str_contains($uri, $pattern)) {
                return true;
            }
        }

        // Skip AJAX requests for certain actions
        if ($request->ajax() && str_contains($action, 'ping')) {
            return true;
        }

        return false;
    }

    /**
     * Sanitize request parameters to remove sensitive data
     */
    private function sanitizeParameters(array $parameters): array
    {
        $sensitiveKeys = [
            'password',
            'password_confirmation',
            'current_password',
            '_token',
            'otp_code',
            'verification_code',
        ];

        foreach ($sensitiveKeys as $key) {
            if (isset($parameters[$key])) {
                $parameters[$key] = '***';
            }
        }

        return $parameters;
    }
}