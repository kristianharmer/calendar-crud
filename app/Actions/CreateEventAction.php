<?php

namespace App\Actions;
use App\Models\Event;
use Illuminate\Http\Request;

class CreateEventAction
{
    /**
     * Create a new action instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Prepare the action for execution, leveraging constructor injection.
    }

    /**
     * Execute the action.
     *
     * @return mixed
     */
    public function execute(Request $request)
    {
        Event::create($request->all());
    }
}
