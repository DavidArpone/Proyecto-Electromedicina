#include <WiFi.h>
#include <OneWire.h>
#include <DallasTemperature.h>

const int oneWirePin = 25;
OneWire oneWireBus (oneWirePin);
DallasTemperature sensor(&oneWireBus);

int contconexion = 0;

const char *ssid = ""; //ssid de la conexión wifi
const char *password = ""; //pw de la conexión wifi

unsigned long previousMillis = 0;
char host[] = ""; //Host a conectar
String strhost = ""; //Host a enviar http Request
String strurl = "/Final2.5/driver/subDataDrive.php"; //Enlace del envío del Post


//-------Función para Enviar Datos a la Base de Datos SQL--------

String enviardatos(String datos) {

  WiFiClient client; //Empezamos una conexión como cliente hacia un servidor
  String linea = "error";

  //Conectamos el esp32 con el host
  if ( !client.connect(host, 80) ) {
    Serial.println("Fallo de conexion");
    return linea;
  }

  //declaramos el POST request
  client.print(String("POST ") + strurl + " HTTP/1.1" + "\r\n" + 
               "Host: " + strhost + "\r\n" +
               "Connection: keep-alive" + "\r\n" + 
               "Content-Length: " + datos.length() + "\r\n" +
               "Cache-Control: max-age=0" + "\r\n" +
               "Upgrade-Insecure-Requests: 1" + "\r\n" +  
               "Origin: http://192.168.1.60" + "\r\n" +                
               "Content-Type: application/x-www-form-urlencoded" + "\r\n" + 
               "User-Agent: Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.86 Safari/537.36 OPR/46.0.2597.32" + "\r\n" +                
               "Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8" + "\r\n" + 
               "Referer: http://192.168.1.60/Final3%20-%20local/driver/subDataDrive.php" + "\r\n" + 
               //"Accept-Encoding: gzip, deflate" + "\r\n" + 
               "Accept-Language: es-419,es;q=0.8" + "\r\n" + 
               "Cookie: __test=f8113e8304f87333c04e20518549f29c; _ga=GA1.2.2140598187.1499029965; _gid=GA1.2.1824054122.1499029966" + "\r\n" +             
               "\r\n" + datos);
 
  delay(10);             

  //Medimos el tiempo de respuesta del servidor
  unsigned long timeout = millis();
  while ( client.available() == 0 ) {
    
    if ( millis() - timeout > 5000 ) {
      Serial.println("Cliente fuera de tiempo!");
      client.stop();
      return linea;
    }
    
  }
  
  // Lee todas las lineas que recibe del servidor y las imprime por la terminal serial
  while( client.available( )){   
    linea = client.readStringUntil('\r');
    Serial.println(linea);    
  }  
  
  return linea;
}

//-------------------------------------------------------------------------

void setup() {

  // Inicia el puerto Serial
  Serial.begin(115200);
  Serial.println("");


  // Conexión WIFI
  WiFi.begin(ssid, password);
  while ( WiFi.status() != WL_CONNECTED and contconexion <50 ) { //Cuenta hasta 50 y, si no se puede conectar, lo cancela
    ++contconexion;
    delay(500);
    Serial.print(".");
  }
  if ( contconexion < 50 ) {

      IPAddress ip(); //Ip asignada al esp32
      IPAddress gateway(); //Entrada del router
      IPAddress subnet(255,255,255,0); //Subred
      WiFi.config(WiFi.localIP(), gateway, subnet); 
     
      Serial.println("");
      Serial.println("WiFi conectado");
      
  }else { 
   Serial.println("");
   Serial.println("Error al conectar WiFi");
  }
}

//--------------------------LOOP--------------------------------
void loop() {

  //Medimos la temperatura con el sensor
  //Libreria OneWire y DallasTemperature
  sensor.requestTemperatures();
  float Temp = sensor.getTempCByIndex(0);
  Serial.println(Temp);
  delay(2000);

   //Enviamos los datos necesarios en un string para insertar en el http request
   enviardatos("UsuarioLogin=99999999&ContraLogin=12345&dato=temp&metrica="+String(Temp)+"&idpaciente=1");
    
   delay(20000);//Repetimos cada 20 Seg
}
