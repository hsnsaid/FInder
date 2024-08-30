<?php
namespace Tests\Unit;

use App\Models\Employer;
use App\Models\Job;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class JobTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic unit test example.
     */
    public function test_belong_to_employer(): void
    {
        $employer = Employer::factory()->create();
        $job = Job::factory()->create([
            'employer_id' => $employer->id
        ]);

        $this->assertSame($employer->id, $job->employer_id);
    }
    public function test_can_have_tag(){
        $job= Job::factory()->create();
        $job->tag('backend');
        $this->assertCount(1,$job->tags);
    }
}
