<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends AbstractController
{
    #[Route('/default', name: 'default')]
    public function index(Request $request): Response
    {
        $request_message = $request->query->get("message");
        $request_type = $request->query->get("type");
        /*   var_dump($request_message);
        var_dump($request_type); */

        if ($request_type == "INFO" || $request_type == "DEBUG" || $request_type == "NOTICE") {
            //Creating log channel debug
            $log = new Logger("info");
            // creating handler to write logs to file
            $log->pushHandler(new StreamHandler("../Logs/info.log", Logger::INFO));
            //Adding records to the logs
            $log->info($request_message);
        }

        if ($request_type == "WARNING"  ) {
            //Creating log channel debug
            $log = new Logger("warning");
            // creating handler to write logs to file
            $log->pushHandler(new StreamHandler("../Logs/warning.log", Logger::WARNING));
            //Adding records to the logs
            $log->warning($request_message);
        }
        if ($request_type == "ERROR" || $request_type == "CRITICAL" || $request_type == "ALERT") {
            //Creating log channel debug
            $log = new Logger("error");
            // creating handler to write logs to file
            $log->pushHandler(new StreamHandler("../Logs/error.log", Logger::ERROR));
            //Adding records to the logs
            $log->error($request_message);
        }

        return $this->render('default/index.html.twig', [
            'controller_name' => 'DefaultController',
        ]);
    }
}
