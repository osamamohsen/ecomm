<?php

namespace App\Exceptions;

use Exception;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Auth;
class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        HttpException::class,
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $e
     * @return void
     */
    public function report(Exception $e)
    {
        return parent::report($e);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $e
     * @return datatype description \Illuminate\Http\Response
     */
    public function render($request, Exception $e)
    {
        if ($this->isHttpException($e))
        { 
            if ($e instanceof NotFoundHttpException || 
                $e instanceof MethodNotAllowedHttpException ||
                $e instanceof CustomException || 
                $e instanceof ForbiddenException)
            {
                // if(Auth::check()) Auth::logout();
                return redirect('/');
            }
            return $this->renderHttpException($e);
        }
        return parent::render($request, $e);
    }
}