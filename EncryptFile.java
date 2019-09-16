import java.lang.*;
import java.util.*;
import java.io.File;
import java.io.FileInputStream;
import java.io.FileNotFoundException;
import java.io.FileOutputStream;
import java.io.IOException;
import java.io.InputStream;
import java.io.OutputStream;
import java.security.InvalidKeyException;
import java.security.NoSuchAlgorithmException;
import javax.crypto.BadPaddingException;
import javax.crypto.Cipher;
import javax.crypto.IllegalBlockSizeException;
import javax.crypto.KeyGenerator;
import javax.crypto.NoSuchPaddingException;
import javax.crypto.SecretKey;
import javax.crypto.spec.SecretKeySpec;

public class EncryptFile {
 
    public  Cipher cipher = null;
    public static SecretKey secretKey;

    public static void main(String[] args) throws NoSuchAlgorithmException, NoSuchPaddingException {
        Scanner sc=new Scanner(System.in);
        String fileToEncrypt = args[0];
        String directoryPath = "C:/xampp/htdocs/BlowTransfer/new/";
        String outdirectoryPath = "c:/xampp/htdocs/BlowTransfer/uploads/";
		//String directoryPath1 = "C:/Users/ypila/Desktop/blow/abc.png";
       // C:/Users/ypila/Desktop/blow
       //C:\Users\ypila\Desktop\blow
       //String ss= new File(directoryPath1).getName();
     // System.out.println(ss);
      //String ext = ss.substring(ss.lastIndexOf(".") + 1);
          //   System.out.println("<br>"+ext);
      
        EncryptFile encryptFile = new EncryptFile();
       // System.out.println("Starting Encryption...");
       // System.out.println("Enter the secret key");
        String key="Shifa";
        SecretKey s=encryptFile.secret(key);
        encryptFile.encrypt(directoryPath + fileToEncrypt, outdirectoryPath + fileToEncrypt , s);
        System.out.print("Encryption completed...");
   
    }
   
    public SecretKey  secret(String k) throws NoSuchAlgorithmException, NoSuchPaddingException
    {
    String Key = k;
    byte[] KeyData = Key.getBytes();
     SecretKey secretKey = new SecretKeySpec(KeyData, "Blowfish");
     
       // System.out.println("this is secret key" +secretKey.toString());
        return secretKey;
    }

    /**
     *
     * @param srcPath
     * @param destPath
     *
     * Encrypts the file in srcPath and creates a file in destPath
     * @throws NoSuchPaddingException
     * @throws NoSuchAlgorithmException
     */
    private void encrypt(String srcPath, String destPath, SecretKey s) throws NoSuchAlgorithmException, NoSuchPaddingException {
       
       
       
        File rawFile = new File(srcPath);
        File encryptedFile = new File(destPath);
        InputStream inStream = null;
        OutputStream outStream = null;
        try {
            /**
             * Initialize the cipher for encryption
             */
            Cipher cipher = Cipher.getInstance("Blowfish");

            cipher.init(Cipher.ENCRYPT_MODE, s);
            /**
             * Initialize input and output streams
             */
            inStream = new FileInputStream(rawFile);
            outStream = new FileOutputStream(encryptedFile);
            byte[] buffer = new byte[1024];
            int len;
            while ((len = inStream.read(buffer)) > 0) {
                outStream.write(cipher.update(buffer, 0, len));
                outStream.flush();
            }
            outStream.write(cipher.doFinal());
            inStream.close();
            outStream.close();
        } catch (IllegalBlockSizeException ex) {
            System.out.println(ex);
        } catch (BadPaddingException ex) {
            System.out.println(ex);
        } catch (InvalidKeyException ex) {
            System.out.println(ex);
        } catch (FileNotFoundException ex) {
            System.out.println(ex);
        } catch (IOException ex) {
            System.out.println(ex);
        }
    }

}
