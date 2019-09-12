/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package feelsmusicinc;

import java.io.BufferedReader;
import java.io.BufferedWriter;
import java.io.FileReader;
import java.io.FileWriter;
import java.io.IOException;

/**
 *
 * @author guilherme_koerber
 */
public class Clientes {
    String nome, idade, senha, email, nick, sexo;
    int idadeconvertida;
  
    public boolean login(String clienteDigitado, String senhaDigitada){
        String dir = System.getProperty("user.dir");
        String linha;
        
        try {
            FileReader arq = new FileReader(dir+"/clientes.txt");
            BufferedReader lerArq = new BufferedReader(arq);
            int cont=0;
            while((linha = lerArq.readLine())!=null){  
                String credenciais[] = linha.split("%");
                int t;
                if(cont==0) {
                    t = credenciais[0].length();
                    credenciais[0] = credenciais[0].substring(1,t);
                    cont++;
                }
                    
                    System.out.println("Cliente :"+credenciais[0]+" - Senha: "+credenciais[1]);
                if((credenciais[0].equals(clienteDigitado))&& (credenciais[1].equals(senhaDigitada))){
                    System.out.println("Usuário e senha correspondem");
                    nome=credenciais[2];
                    email=credenciais[3];
                    idade=credenciais[4];
                    nick=credenciais[5];
                    sexo=credenciais[6];
                    System.out.println(nome+"\n"+idade+"\n"+email+"\n"+nick+"\n"+credenciais[0]+"\n"+credenciais[1]+"\n"+sexo);
                    return true;
                }
            }
            System.out.println("Usuário e senha NÃO correspondem");
            arq.close();  
        } catch (Exception e) {
            e.printStackTrace();
        }
        return false;
    }
    
    public boolean cadastrar(String clienteDigitado, String senhaDigitada){
        String dir = System.getProperty("user.dir");
        try{
            FileWriter fw = new FileWriter(dir+"/clientes.txt", true);
            BufferedWriter arquivo = new BufferedWriter(fw);
            arquivo.write(clienteDigitado+ "%" + senhaDigitada+ "%" +nome+ "%"+email+ "%" +idade+ "%" +nick + "%" + sexo);
            arquivo.newLine();
            arquivo.close();  
            return true;
        }catch (IOException e){
            e.printStackTrace();
            return false;
        }
            
    }
}
