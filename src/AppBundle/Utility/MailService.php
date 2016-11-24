<?php
/**
 * Created by PhpStorm.
 * User: higom
 * Date: 20/11/2016
 * Time: 6:24 PM
 */

namespace AppBundle\Utility;


class MailService
{

    private $email;
    private $pass;
    private $name;
    private $nameDoctor;
    private $lastNameDoctor;
    private $gender;
    private $tipeMail;
    private $address;
    private $phone;
    private $day;
    private $month;
    private $year;
    private $time;
    private $dateid;
    private $date;
    private $comments;
    private $tittle;

    /**
     * @return mixed
     */
    public function getPass()
    {
        return $this->pass;
    }

    /**
     * @param mixed $pass
     */
    public function setPass($pass)
    {
        $this->pass = $pass;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getNameDoctor()
    {
        return $this->nameDoctor;
    }

    /**
     * @param mixed $nameDoctor
     */
    public function setNameDoctor($nameDoctor)
    {
        $this->nameDoctor = $nameDoctor;
    }

    /**
     * @return mixed
     */
    public function getLastNameDoctor()
    {
        return $this->lastNameDoctor;
    }

    /**
     * @param mixed $lastNameDoctor
     */
    public function setLastNameDoctor($lastNameDoctor)
    {
        $this->lastNameDoctor = $lastNameDoctor;
    }

    /**
     * @return mixed
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @param mixed $gender
     */
    public function setGender($gender)
    {
        $this->gender = $gender;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getTipeMail()
    {
        return $this->tipeMail;
    }

    /**
     * @param mixed $tipeMail
     */
    public function setTipeMail($tipeMail)
    {
        $this->tipeMail = $tipeMail;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param mixed $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param mixed $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }


    /**
     * @return mixed
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * @param mixed $time
     */
    public function setTime($time)
    {
        $this->time = $time;
    }

    /**
     * @return mixed
     */
    public function getDay()
    {
        return $this->day;
    }

    /**
     * @param mixed $day
     */
    public function setDay($day)
    {
        $this->day = $day;
    }

    /**
     * @return mixed
     */
    public function getMonth()
    {
        return $this->month;
    }

    /**
     * @param mixed $month
     */
    public function setMonth($month)
    {
        $this->month = $month;
    }

    /**
     * @return mixed
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * @param mixed $year
     */
    public function setYear($year)
    {
        $this->year = $year;
    }

    /**
     * @return mixed
     */
    public function getDateid()
    {
        return $this->dateid;
    }

    /**
     * @param mixed $dateid
     */
    public function setDateid($dateid)
    {
        $this->dateid = $dateid;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return mixed
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * @param mixed $comments
     */
    public function setComments($comments)
    {
        $this->comments = $comments;
    }

    /**
     * @return mixed
     */
    public function getTittle()
    {
        return $this->tittle;
    }

    /**
     * @param mixed $tittle
     */
    public function setTittle($tittle)
    {
        $this->tittle = $tittle;
    }


    public function sendEmail()
    {


        $emailToSend = $this->emailVerification($this->email);

        if($emailToSend == true){
            $gebder_R = "";
            $welcome = "";
            $lonely ="";
            if ($this->getGender() == "m") {
                $gebder_R = "el Doctor";
                $welcome = 'Bienvenido';
                $lonely =  'solo';
            } elseif ($this->getGender() == "f") {
                $gebder_R = "la Doctora";
                $welcome = 'Bienvenida';
                $lonely =  'sola';
            }



            $transport = \Swift_SmtpTransport::newInstance()
                ->setHost('smtp.gmail.com')
                ->setPort('587')
                ->setEncryption('tls')
                ->setUsername('higcell@gmail.com')
                ->setPassword('9153113sbib');

            $mailer = \Swift_Mailer::newInstance($transport);


            if ($this->getTipeMail() == 1) {
                $message = \Swift_Message::newInstance()
                    ->setSubject('Solicitud de cotizacion')
                    ->setFrom(array('distriherramientas@gmail.com' => 'DISTRIHERRAMIENTAS'))
                    ->setTo(array($this->getEmail() => $this->getName()))
                    ->setBody('
                <div marginheight="0" marginwidth="0" style="background-color:#ececec"><div class="adM">
                    <table style="max-width:1000px;margin:auto" align="center">
                        <tbody>
                            <tr>
                                <td style="font-size:16px;font-weight:bold;padding-top:2px;padding-bottom:20px;padding-left:25px;padding-right:25px;text-align:center;color:#353e4a;font-family:Arial,sans-serif" align="center" width="100%">
                                </td>
                            </tr>
                            <tr>
                                <td style="padding-bottom:8px">
                                    <table style="color:#353e4a;font-family:Arial,sans-serif;font-size:18px;margin:auto" align="center" bgcolor="#ffffff" border="0">
                                        <tbody>
                                            <tr>
                                                <td style="padding-top:20px;padding-bottom:1px;padding-left:20px;padding-right:20px" align="right" width="100%">
                                                    <a href="" title="Citamed" target="_blank">
                                                        <img alt="Citamed" src="https://lh3.googleusercontent.com/-jwq6X12A2pk/WDI1spsOrZI/AAAAAAAACDg/FmcdsrO2Ti0m6hF1HhADhXi9rO5bzX2YACL0B/h84/2016-11-20.png" class="CToWUd">
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="color:#1e80b6;padding-top:1px;padding-bottom:1px;padding-left:20px;padding-right:20px">
                                                     <h2>Hola, ' . ucfirst($this->getName()) . '</h2> 
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="line-height:24px;padding-left:20px;padding-right:20px;padding-bottom:30px" colspan="2">
                                                        Hemos recibido una solicitud de cotización a nombre tuyo.
                                                <br><br>
                                                    En este proceso, uno de nuestros asesores te contactará  para resolver dudas o ayudarte en todo lo que tenga que ver con nuestro servicio.
                                                <br><br>
                                                    Recuerda que la <strong>solicitud de cotizacion</strong> no correspode a una compra, ni a un compromiso sobre los productos de los que deseas saber.
                                                    
                                                <br> <br>
                                                    Este email se envia de forma automatica, por favor no lo responda. 
                                                <br> <br>
                                                    Atentamente,
                                                <br><br>
                                                    Equipo Distriherramientas.
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="height:5px" height="5"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size:16px;font-weight:bold;padding-top:20px;padding-bottom:20px;padding-left:25px;padding-right:25px;text-align:center;color:#353e4a;font-family:Arial,sans-serif" align="center" width="100%">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                ', 'text/html');
                $mailer->send($message);

            } elseif ($this->getTipeMail() == 2) {
                $message = \Swift_Message::newInstance()
                    ->setSubject($this->getTittle())
                    ->setFrom(array('distriherramientas@gmail.com' => 'DISTRIHERRAMIENTAS'))
                    ->setTo($this->getEmail())
                    ->setBody('
                <div marginheight="0" marginwidth="0" style="background-color:#ececec"><div class="adM">
                    <table style="max-width:1000px;margin:auto" align="center">
                        <tbody>
                            <tr>
                                <td style="font-size:16px;font-weight:bold;padding-top:2px;padding-bottom:20px;padding-left:25px;padding-right:25px;text-align:center;color:#353e4a;font-family:Arial,sans-serif" align="center" width="100%">
                                </td>
                            </tr>
                            <tr>
                                <td style="padding-bottom:8px">
                                    <table style="color:#353e4a;font-family:Arial,sans-serif;font-size:18px;margin:auto" align="center" bgcolor="#ffffff" border="0">
                                        <tbody>
                                            <tr>
                                                <td style="padding-top:20px;padding-bottom:1px;padding-left:20px;padding-right:20px" align="right" width="100%">
                                                    <a href="" title="Citamed" target="_blank">
                                                        <img alt="Citamed" src="https://lh3.googleusercontent.com/-jwq6X12A2pk/WDI1spsOrZI/AAAAAAAACDg/FmcdsrO2Ti0m6hF1HhADhXi9rO5bzX2YACL0B/h84/2016-11-20.png" class="CToWUd">
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr style="color:#1e80b6;padding-top:1px;padding-bottom:1px;padding-left:20px;padding-right:20px">
                                                     <h2>Hola, <strong>'.$this->getName(). '</strong> nos ha escrito.</h2>
                                            </tr>
                                            <tr>
                                                <br><br>
                                                     Quiere expresarnos lo siguiente: 
                                                     <br>
                                                     <br>
                                                     '.$this->getComments().'.
                                                     <br>
                                                     <br>
                                                     y puedes contactarle al siguente email: <strong>'.$this->getAddress()  .'</strong>.
                                                    
                                                <br> <br>
                                                    <h6>Este email se envia de forma automatica.</h6>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="height:5px" height="5"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size:16px;font-weight:bold;padding-top:20px;padding-bottom:20px;padding-left:25px;padding-right:25px;text-align:center;color:#353e4a;font-family:Arial,sans-serif" align="center" width="100%">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                ', 'text/html');
                $mailer->send($message);
            }

        }


    }

    private function emailVerification($mail)
    {
        $syntax='#^[\w.-]+@[\w.-]+\.[a-zA-Z]{2,6}$#';
        if(preg_match($syntax,$mail)){
            return true;
        } else {
            return false;
        }
    }
}