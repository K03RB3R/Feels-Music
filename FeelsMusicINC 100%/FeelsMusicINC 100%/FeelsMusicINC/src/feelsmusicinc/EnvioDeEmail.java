/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package feelsmusicinc;

import java.util.logging.Level;
import java.util.logging.Logger;
import org.apache.commons.mail.DefaultAuthenticator;
import org.apache.commons.mail.Email;
import org.apache.commons.mail.EmailException;
import org.apache.commons.mail.SimpleEmail;

/**
 *
 * @author Guilherme
 */
public class EnvioDeEmail {
    
    public EnvioDeEmail(){
        
    }
    
    public void enviarEmail(String email_usuario) {
        
      try {
       // System.out.println("ola "+email_usuario);
        Email email = new SimpleEmail();
        email.setHostName("smtp.gmail.com"); //smtp.gmail.com e smtp.googlemail.com
        email.setSmtpPort(465);
        email.setAuthenticator(new DefaultAuthenticator("feelsmusic.inc@gmail.com", "trabalhosa"));
        email.setSSLOnConnect(true);
        email.setFrom("feelsmusic.inc@gmail.com");
        email.setSubject("Bem Vindo a FEELS MUSIC");
        email.setMsg("Agora você é um membro! Aproveite e sinta o melhor da música!");
        email.addTo(email_usuario);
        System.out.println(email_usuario);
        email.send();
      }catch (EmailException ex) {
          Logger.getLogger(EnvioDeEmail.class.getName()).log(Level.SEVERE,null, ex);
        
    }
    
    }
}
    

