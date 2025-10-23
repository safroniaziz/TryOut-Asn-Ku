<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Spatie\Activitylog\Models\Activity;

class LogActivityJob implements ShouldQueue
{
    use Queueable;

    public $logName;
    public $description;
    public $properties;
    public $causerId;
    public $causerType;
    public $subjectId;
    public $subjectType;

    /**
     * Create a new job instance.
     */
    public function __construct(
        string $logName,
        string $description,
        array $properties = [],
        ?int $causerId = null,
        ?string $causerType = null,
        ?int $subjectId = null,
        ?string $subjectType = null
    ) {
        $this->logName = $logName;
        $this->description = $description;
        $this->properties = $properties;
        $this->causerId = $causerId;
        $this->causerType = $causerType;
        $this->subjectId = $subjectId;
        $this->subjectType = $subjectType;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Activity::create([
            'log_name' => $this->logName,
            'description' => $this->description,
            'properties' => $this->properties,
            'causer_id' => $this->causerId,
            'causer_type' => $this->causerType,
            'subject_id' => $this->subjectId,
            'subject_type' => $this->subjectType,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
