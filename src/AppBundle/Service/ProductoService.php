<?php


namespace AppBundle\Service;

use AppBundle\Entity\Cliente;
use AppBundle\Entity\Persona;
use AppBundle\Entity\VentaAsistida;
use AppBundle\Entity\VentaAsistidaProducto;
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
    private $repositoryCliente;
    private $repositoryEstadoVentaAsistida;
    private $repositoryTipoIdentificacion;
    private $repositoryMunicipio;
    private $em;


    public function __construct(EntityManager $entityManager)
    {
        $this->em = $entityManager;
        $this->repositoryProducto = $this->em->getRepository('AppBundle:Producto');
        $this->repositoryCliente = $this->em->getRepository('AppBundle:Cliente');
        $this->repositoryEstadoVentaAsistida = $this->em->getRepository('AppBundle:EstadoVentaAsistida');
        $this->repositoryTipoIdentificacion = $this->em->getRepository('AppBundle:TipoIdentificacion');
        $this->repositoryMunicipio = $this->em->getRepository('AppBundle:Municipio');

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

    public function generateNewTransaction(Request $request)
    {
        $data_array = array(
            'clientEmail' => $request->request->get('clientEmail'),
            'clientLastName' => $request->request->get('clientLastName'),
            'clientName' => $request->request->get('clientName'),
            'clientIdentification' => $request->request->get('clientIdentification'),
            'clientPhone' => $request->request->get('clientPhone'),
            'observaciones' => $request->request->get('observaciones'),
            'clientTown' => $request->request->get('clientTown'),
            'clientIdentificationType' => $request->request->get('clientIdentificationType'),
            'productsArray' => $request->request->get('productsArray'),

        );
        $jsonResponse = array();

        if ($data_array['productsArray'] != null && $data_array['clientName'] != null && $data_array['clientEmail'] != null) {

            $cliente = $this->repositoryCliente->findOneBy(array('correoElectronico' => $data_array['clientEmail']));

            if (count($cliente) > 0) {

                $estadoVenta = $this->repositoryEstadoVentaAsistida->findOneBy(array('nombreEstadoVentaAsistida' => 'Nueva'));
                $ventaAsistida = new VentaAsistida();

                $now = new \DateTime();

                $ventaAsistida->setCliente($cliente);
                $ventaAsistida->setFechaSolicitud($now);
                $ventaAsistida->setEstadoVentaAsistida($estadoVenta);
                $this->em->persist($ventaAsistida);
                $this->em->flush();


                /* entida venta assistida Producto*/

                foreach ($data_array['productsArray'] as $item) {
                    $poducto = $this->repositoryProducto->findOneBy(array('codigoProducto' => $item['productoId']));
                    $ventaAsistidaProducto = new VentaAsistidaProducto();
                    $ventaAsistidaProducto->setObservaciones($data_array['observaciones']);
                    $ventaAsistidaProducto->setCantidadProducto($item['quantity']);
                    $ventaAsistidaProducto->setProducto($poducto);
                    $ventaAsistidaProducto->setVentaAsistida($ventaAsistida);
                    $this->em->persist($ventaAsistidaProducto);
                }
                $this->em->flush();

            } else {

                $persona = new Persona();
                $cliente = new Cliente();
                $tipoId = $this->repositoryTipoIdentificacion->findOneBy(array('nombreTipoIdentificacion' => $data_array['clientIdentificationType']['']));
                (count($tipoId) > 0 ? $tipoId : $tipoId = $this->repositoryTipoIdentificacion->findOneBy(array('id' => 1)));

                $municipio = $this->repositoryMunicipio->findOneBy(array('nombreMunicipio' =>  $data_array['clientTown']));



                (count($municipio) > 0 ? $municipio : $municipio = $this->repositoryMunicipio->findOneBy(array('nombreMunicipio' => 'Medellín')));

                $persona->setApellido($data_array['clientLastName']);
                $persona->setNombre($data_array['clientName']);
                $persona->setIdentificacion($data_array['clientIdentification']);
                $persona->setTelefono($data_array['clientPhone']);
                $persona->setTipoentificacion($tipoId);
                $persona->setMunicipio($municipio);
                $this->em->persist($persona);
                $this->em->flush();

                /* cliente */
                $cliente->setCorreoElectronico($data_array['clientEmail']);
                $cliente->setPersona($persona);
                $cliente->setEstado('Activo');
                $this->em->persist($cliente);
                $this->em->flush();
                $estadoVenta = $this->repositoryEstadoVentaAsistida->findOneBy(array('nombreEstadoVentaAsistida' => 'Nueva'));
                $ventaAsistida = new VentaAsistida();

                $now = new \DateTime();

                $ventaAsistida->setCliente($cliente);
                $ventaAsistida->setFechaSolicitud($now);
                $ventaAsistida->setEstadoVentaAsistida($estadoVenta);
                $this->em->persist($ventaAsistida);
                $this->em->flush();


                /* entida venta assistida Producto*/

                foreach ($data_array['productsArray'] as $item) {
                    $poducto = $this->repositoryProducto->findOneBy(array('codigoProducto' => $item['productoId']));
                    $ventaAsistidaProducto = new VentaAsistidaProducto();
                    $ventaAsistidaProducto->setObservaciones($data_array['observaciones']);
                    $ventaAsistidaProducto->setCantidadProducto($item['quantity']);
                    $ventaAsistidaProducto->setProducto($poducto);
                    $ventaAsistidaProducto->setVentaAsistida($ventaAsistida);
                    $this->em->persist($ventaAsistidaProducto);
                }
                $this->em->flush();
            }

            $jsonResponse =array(
                'status' => true,
                'message' => 'email sent'
            );


        } else {
            $jsonResponse = array(
                'status' => false,
                'message' => 'missing Parameters'
            );
        }
        return $jsonResponse;
    }

}