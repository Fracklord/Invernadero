#include<SPI.h>
#include<Ethernet.h>
int pinCap = 0;
int valor_humedad_suelo=0;
byte mac[] = {0xDE, 0xAD, 0xBE, 0xEF, 0xFF, 0xEE}; // Direccion MAC
byte ip[] = {192,168,0,101};
byte server[] = {192,168,0,100};
EthernetClient client;

void setup(void) {
  Ethernet.begin(mac, ip);
  Serial.begin(9600);
  delay(1000);
}

void loop(void) {
  valor_humedad_suelo = analogRead(pinCap);
  Serial.println(valor_humedad_suelo);

  if(client.connect(server,80)>0){
    Serial.println("conexion establecidad");
    client.print("GET /vivero/prueba.php?valor_humedad_suelo=");
    client.print(valor_humedad_suelo);
    client.println(" HTTP/1.0");
    client.println("User-Agent: Arduino 1.0");
    client.println();
    Serial.println("Conectado"); 
  }
  
  else {
    Serial.println("Error en la conexion");
  }
  
  client.stop();
  client.flush();
  delay(1000);
  }
   
