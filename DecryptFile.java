
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
import javax.crypto.NoSuchPaddingException;
import javax.crypto.SecretKey;
import javax.crypto.spec.SecretKeySpec;
import java.util.*;

public class DecryptFile {

     public static void main(String[] args) throws NoSuchAlgorithmException, NoSuchPaddingException {
           
           Scanner sc=new Scanner(System.in);
            String fileToEncrypt =args[0];
            String encryptedFile = "encryptedFile.png";
            String decryptedFile = "decryptedFile.png";
            String directoryPath = "c:/xampp/htdocs/BlowTransfer/uploads/";
            String outdirectoryPath = "c:/xampp/htdocs/BlowTransfer/uploads/decrypt/";
           EncryptFile decryptFile = new EncryptFile();
          // System.out.println("Enter secret key to decrypt image ");
           String key="Shifa";//sc.next();
           SecretKey s=decryptFile.secret(key);
           // System.out.println("Starting Decryption...");
            DecryptFile.decrypt(directoryPath + fileToEncrypt, outdirectoryPath + fileToEncrypt, s);
            System.out.println("Decryption completed...");
          
           
           
        }
     private static void decrypt(String srcPath, String destPath , SecretKey s) throws NoSuchAlgorithmException, NoSuchPaddingException {
            File encryptedFile = new File(srcPath);
            File decryptedFile = new File(destPath);
            InputStream inStream = null;
            OutputStream outStream = null;
            try {
                /**
                 * Initialize the cipher for decryption
                 */
                Cipher cipher = Cipher.getInstance("Blowfish");

                cipher.init(Cipher.DECRYPT_MODE, s);
                /**
                 * Initialize input and output streams
                 */
                inStream = new FileInputStream(encryptedFile);
                outStream = new FileOutputStream(decryptedFile);
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