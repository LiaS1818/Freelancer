<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


class Controlador
{
    public static function contacto()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $respuestas = $_POST['contacto'];

            // Crear instancia de PHPMailer
            $phpmailer = new PHPMailer();

            // Configuración SMTP para Mailtrap
            $phpmailer->isSMTP();
            $phpmailer->Host = 'sandbox.smtp.mailtrap.io';
            $phpmailer->SMTPAuth = true;
            $phpmailer->Port = 2525;
            $phpmailer->Username = 'fcd7647f8ffe36';
            $phpmailer->Password = '3928dd32bdb7df';
            $phpmailer->SMTPSecure = 'tls';

            // Configuración del correo electrónico
            $phpmailer->setFrom('admin@CBDSolutions.com');
            $phpmailer->addAddress('admin@CBDSolution.com', 'CBDSolutions.com');
            $phpmailer->Subject = 'Tienes un nuevo mensaje';

            // Habilitar HTML y contenido del mensaje
            $phpmailer->isHTML(true);
            $phpmailer->CharSet = 'UTF-8';
            $contenido = '<html>';
            $contenido .= '<p> Tienes un nuevo mensaje </p>';
            $contenido .= '<p>Nombre: ' . $respuestas['nombre'] . '</p>';

            if ($respuestas['contacto'] === 'telefono') {
                $contenido .= '<p>Teléfono: ' . $respuestas['telefono'] . '</p>';
                $contenido .= '<p>Fecha: ' . $respuestas['fecha'] . '</p>';
                $contenido .= '<p>Hora: ' . $respuestas['hora'] . '</p>';
            } else {
                $contenido .= '<p>Email: ' . $respuestas['email'] . '</p>';
            }

            $contenido .= '<p>Mensaje: ' . $respuestas['mensaje'] . '</p>';
            $contenido .= '</html>';

            $phpmailer->Body = $contenido;
            $phpmailer->AltBody = 'Esto es un texto alternativo';

            // Enviar el email
            if ($phpmailer->send()) {
                echo "Mensaje enviado correctamente";
            } else {
                echo "El mensaje no se pudo enviar...";
            }
            header('Location: ' . $_SERVER['REQUEST_URI']);
        }
    }
}
