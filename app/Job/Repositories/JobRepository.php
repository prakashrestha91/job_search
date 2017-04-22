<?php
/**
 * Created by PhpStorm.
 * User: prakash
 * Date: 4/22/17
 * Time: 9:06 PM
 */

namespace App\Job\Repositories;


use App\Job\Entities\jobs;
use Illuminate\Database\QueryException;

class JobRepository
{
    /**
     * @var jobs
     */
    private $jobs;

    public function __construct(jobs $jobs)
    {

        $this->jobs = $jobs;
    }

    public function storesJobs($data)
    {

        try {
            $this->jobs->create($data);
            return true;
        } catch (QueryException $e) {
            return false;
        }
    }

    public function getallJobs()
    {
        return $this->jobs->select('*')->get();
    }

    public function getJobbyId($id)
    {
        return $this->jobs->select('*')->where('id',$id)->first();
    }

    public function updateJob($request, $id)
    {
        try {

            $query = jobs::find($id);
            $query->category_id = $request->category_id;
            $query->company_name = $request->company_name;
            $query->name = $request->name;
            $query->opening = $request->opening;
            $query->short_description = $request->short_description;
            $query->total_description = $request->total_description;
            $query->requirement = $request->requirement;
            $query->salary = $request->salary;
            $query->education = $request->education;
            $query->experience = $request->experience;
            $query->job_location = $request->job_location;
            $query->working_hours = $request->working_hours;
            $query->job_display_duration = $request->job_display_duration;
            $query->save();

            return true;
        } catch (QueryException $e) {
            return false;
        }
    }

}