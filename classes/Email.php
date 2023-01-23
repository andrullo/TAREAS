<?php 

namespace Classes;

use PHPMailer\PHPMailer\PHPMailer;

class Email {
    protected $email;
    protected $nombre;
    protected $token;

    public function __construct($email, $nombre, $token)
    {
        $this->email = $email;
        $this->nombre = $nombre;
        $this->token = $token;

    }

    public function enviarConfirmacion() {

        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'imap.hostinger.com';
        $mail->SMTPAuth = true;
        $mail->Port = 465;
        $mail->Username = 'admin@andrullosoft.es';
        $mail->Password = 'Admin_debjobs1';

        $mail->setFrom('admin@andrullosoft.es');
        $mail->addAddress($this->email);
        $mail->Subject = 'Confirma tu Cuenta';

        $mail->isHTML(TRUE);
        $mail->CharSet = 'UTF-8';

        $contenido = '<html>';
        $contenido .= "<p><strong>Hola " . $this->nombre . "</strong> Has Creado tu cuenta en UpTask, solo debes confirmarla en el siguiente enlace</p>";
        $contenido .= "<p>Presiona aquí: <a href='https://tareas.andrullosoft.es/confirmar?token=" . $this->token . "'>Confirmar Cuenta</a></p>";
        $contenido .= "<p>Si tu no creaste esta cuenta, puedes ignorar este mensaje</p>";
        $contenido .= '</html>';

        $mail->Body = $contenido;


        // Enviar el email
        $mail->send();
    }


    public function enviarInstrucciones() {

        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'imap.hostinger.com';
        $mail->SMTPAuth = true;
        $mail->Port = 465;
        $mail->Username = 'admin@andrullosoft.es';
        $mail->Password = 'Admin_debjobs1';

        $mail->setFrom('admin@andrullosoft.es');
        $mail->addAddress($this->email);
        $mail->Subject = 'Reestablece tu Password';

        $mail->isHTML(TRUE);
        $mail->CharSet = 'UTF-8';

        $contenido = '<html>';
        $contenido .= "<p><strong>Hola " . $this->nombre . "</strong> Parece que has olvidado tu password, sigue el siguiente enlace para recuperarlo</p>";
        $contenido .= "<p>Presiona aquí: <a href='https://tareas.andrullosoft.es/reestablecer?token=" . $this->token . "'>Reestablecer Password</a></p>";
        $contenido .= "<p>Si tu no creaste esta cuenta, puedes ignorar este mensaje</p>";
        $contenido .= '</html>';

        $mail->Body = $contenido;


        // Enviar el email
        $mail->send();
    }
}