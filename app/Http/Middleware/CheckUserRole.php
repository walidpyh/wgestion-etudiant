<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;


class CheckUserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if the user is logged in
        if (auth()->check()) {
            // Get the user's role
            $userRole = auth()->user()->role;

            error_log("User role: $userRole");

            // Define the roles that have access to specific routes
            $allowedRoles = [
                'admin' => [
                    'etudiants.index', 'etudiants.create', 'etudiants.store', 'etudiants.show', 'etudiants.edit', 'etudiants.update', 'etudiants.destroy',
                    'filieres.index', 'filieres.create', 'filieres.store', 'filieres.show', 'filieres.edit', 'filieres.update', 'filieres.destroy',
                    'filieres.with.etudiant.count',
                ],
                'student' => ['filieres.with.etudiant.count'],
            ];
            

            // Check if the user's role has access to the current route
            if (isset($allowedRoles[$userRole]) && in_array($request->route()->getName(), $allowedRoles[$userRole])) {
                return $next($request);
            }

            // If not allowed, redirect to a different route or show an error
            return redirect('/')->with('error', 'You do not have permission to access this page.');
        }

        // If the user is not logged in, redirect to the login page
        return redirect('login');
    }
}
