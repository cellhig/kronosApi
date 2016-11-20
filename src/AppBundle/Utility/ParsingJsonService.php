<?php

namespace AppBundle\Utility;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\ParameterBag;

class ParsingJsonService {

    /**
     * @param Request $request
     * @return bool
     */
    public function jsonFormatter(Request $request) {

        if (0 === strpos($request->headers->get('Content-Type'), 'application/json')) {
            $data = json_decode($request->getContent(), true);
            $request->request->replace(is_array($data) ? $data : array());
            return true;
        } else {
            return false;
        }
    }
}