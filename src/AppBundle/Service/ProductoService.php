<?php


namespace AppBundle\Service;

use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManager;
use DateInterval;

use AppBundle\Entity\Producto;
use Symfony\Component\Validator\Constraints\DateTime;

class ProductoService
{
    private $repositoryProducto;
    private $em;


    public function __construct(EntityManager $entityManager)
    {
        $this->em = $entityManager;
        $this->repositoryProducto = $this->em->getRepository('AppBundle:Producto');

    }

    public function getProducts()
    {
        $jsonResponse = array();
        $productosArray = array();

        $prodcutos = $this->repositoryProducto->findBy(array());

        if (count($prodcutos) > 0) {


            foreach ($prodcutos as $prodcuto){
                $productosArray[] = array(
                    'productoId' => $prodcuto->getCodigoProducto(),
                    'name' => $prodcuto->getNombre(),
                    'description' => $prodcuto->getDescripcion(),
                    'image' => 'http://kronoswebserver.cloudapp.net/kronos/backend/web/'.$prodcuto->getImagen(),
                    'isInstock' => ($prodcuto->getEstado() == 'Activo' ? true : false ),
                    'Codigocategoria' => $prodcuto->getCategoriaProducto()->getCodigoCategoria(),
                    'Nombrecategoria' => $prodcuto->getCategoriaProducto()->getNombreCategoria()
                );
            }
            $jsonResponse = array(
                'status' => true,
                'productsArray' => $productosArray
            );
        } else {
            $jsonResponse = array(
                'status' => false,
                'message'=>'no products to show'
            );
        }
        return $jsonResponse;
    }

}