<?php
/**
 * Created by PhpStorm.
 * User: higom
 * Date: 13/11/2016
 * Time: 2:07 PM
 */

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
//use AppBundle\Constant\Constant;

/**
 * Garage api controller.
 *
 * @Route("api/productos")
 */
class ProductoController extends Controller
{
    /**
     * @ApiDoc(
     *  description="ver productos",
     * parameters={
     *      {"name"="param_uno", "dataType"="string", "required"=true, "description"="algo"}
     *  }
     * )
     * @Route("/get_all", name="app_api_get_all", defaults={"_format": "json"})
     * @Method({"POST"})
     * @param Request $request
     * @return JsonResponse
     */
    public function getProductsAction(Request $request){
        $jsonResponse = null;
        $dateService = $this->get('api.ProductoService')->getProducts();
        if ($dateService != null) {
            $jsonResponse = $dateService;
            $code = 200;
        } else {
            $jsonResponse = array('message'=> 'error fatal', 'status' => false);
        }
        $response = new Response(json_encode($jsonResponse));
        //$response->setStatusCode($code);
        return $response;

    }

    /**
     * @ApiDoc(
     *  description="crear venta asistida",
     * parameters={
     *  }
     * )
     * @Route("/create_assist_sale", name="app_api_create_assist_sale", defaults={"_format": "json"})
     * @Method({"POST"})
     * @param Request $request
     * @return JsonResponse
     */
    public function generateNewTransactionAction(Request $request){
        $jsonFormatter = $this->get('utility.jsonService');
        $jsonResponse = null;
        $code = 500;
        if ($jsonFormatter->jsonFormatter($request)) {
            $dateService = $this->get('api.ProductoService')->generateNewTransaction($request);
            if ($dateService != null) {
                $jsonResponse = $dateService;
                $code = 200;
            } else {
                $jsonResponse = array('message' => 'error', 'status' => false);
            }
            $response = new Response(json_encode($jsonResponse));
            $response->setStatusCode($code);
            return $response;
        } else {
            $jsonResponse = array('message' => 'invalid Json', 'status' => false);
            $response = new Response(json_encode($jsonResponse));
            $response->setStatusCode(400);
            return $response;
        }

    }
}