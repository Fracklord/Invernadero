//LIBRERÍAS SENSOR CAPACITIVO
#include<SPI.h>
#include<Ethernet.h>
//Capacitive Soil Moinsture Sensor v1.2
#include <Wire.h>
//DS18B20
#include <OneWire.h>
#include <DallasTemperature.h>

const int pinCap = 0;
float varCap;

const int pinDS18B20 = 2;
OneWire oneWireObjeto(pinDS18B20);
DallasTemperature sensorDS18B20(&oneWireObjeto);

const int pinLDR = 1;
int varLDR;

const int Trigger = 7;
const int Echo = 8; 

byte mac[] = {0xDE, 0xAD, 0xBE, 0xEF, 0xFF, 0xEE};
byte ip[] = {192,168,0,101};
byte server[] = {192,168,0,100};
EthernetClient client;

void setup(void){
  Ethernet.begin(mac, ip);
  Serial.begin(9600);
  pinMode(Trigger, OUTPUT);
  pinMode(Echo, INPUT);
  digitalWrite(Trigger, LOW);
  delay(1000);
}

void loop(void){
  varCap = analogRead(pinCap);
  Serial.print("HUMEDAD SUELO: ");
  Serial.println(varCap);

  Serial.print("TEMPERATURA AMBIENTE: ");
  Serial.println(sensorDS18B20.getTempCByIndex(0));

  varLDR = analogRead(pinLDR);
  Serial.print("VALOR LUMINOSIDAD: ");
  Serial.println(varLDR);

  long t;
  long d;
  digitalWrite(Trigger, HIGH);
  delayMicroseconds(10);
  digitalWrite(Trigger, LOW);
  t = pulseIn(Echo, HIGH);
  d = t/59; 
  Serial.print("CANTIDAD AGUA: ");
  Serial.println(d);

  if(client.connect(server,80)>0){
    Serial.println("conexión establecida");
    client.print("GET /Invernadero/datos.php?varCap=");
    client.print(varCap);
    client.println(" HTTP/1.0");
    client.println("User-Agent: Arduino 1.0");
    client.println();
    Serial.println("Conectado"); 
  }

  if(client.connect(server,80)>0){
    Serial.println("conexión establecida");
    client.print("GET /Invernadero/datos.php?sensorDS18B20=");
    client.print(sensorDS18B20.getTempCByIndex(0));
    client.println(" HTTP/1.0");
    client.println("User-Agent: Arduino 1.0");
    client.println();
    Serial.println("Conectado"); 
  }

  if(client.connect(server,80)>0){
    Serial.println("conexión establecida");
    client.print("GET /Invernadero/datos.php?varLDR=");
    client.print(varLDR);
    client.println(" HTTP/1.0");
    client.println("User-Agent: Arduino 1.0");
    client.println();
    Serial.println("Conectado"); 
  }
  
  if(client.connect(server,80)>0){
    Serial.println("conexión establecida");
    client.print("GET /Invernadero/datos.php?d=");
    client.print(d);
    client.println(" HTTP/1.0");
    client.println("User-Agent: Arduino 1.0");
    client.println();
    Serial.println("Conectado"); 
  }
  
  else{
    Serial.println("Error en la conexion");
  }
  
  client.stop();
  client.flush();
  delay(1000);
}
   
