<?php namespace App\Http\Middleware;

use Closure;
use Request;
use App\Waikoa\Model\Course;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class RedirectIfNotAllowedOnCourse {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		// redirect if current user does not own course resource
		$params = $request->route()->parameters();		
		if (!empty($params['id'])) {
			try {
				$course = Course::findOrFail($params['id']);				
			
			} catch(ModelNotFoundException $e) {
				return redirect("courses")->with('warning', 'Record not found.');
			}
			
			if(!$request->user()->isSuperadmin()) {
				$course = Course::findOrFail($params['id']);
				if ($course->user_id != $request->user()->id) {
					return redirect("courses")->with('warning', 'You have insufficient permissions.');
				}
			}
		}
		
		return $next($request);
	}

}
