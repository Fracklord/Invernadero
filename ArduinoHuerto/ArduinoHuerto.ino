/*
|-------------------------|
|                         |
|    Huerto Inteligente   |  
|         Kaju-en         |
|       -----X-----       |
|   Proyecto entregado a  |
|     CFT LOTA ARAUCO     |
|                         |
|-------------------------|
|                         |
|        IMPORTANTE       |
|  El producto entregado  |
|  contempla la utiliza-  |
|  ción de los componen-  |
|  tes señalados a con-   |
|  tinuación:             |
|                         |
|-------------------------|
|     Última edición      |
|       19/12/2019        |
|-------------------------|
 
  SENSORES
+ Soil Moinsture Sensor v1.2
+ DS18B20
+ Resistencia fotosensible/LDR
+ HC-SR04

  ACTUADORES
+ Turbina ventilador 12v
+ Motor ventilador 12v
+ Bomba de agua anfibia 5v/6v
+ Speaker tester

--------------------------
        FRACKLORD      
--------------------------
*/
//LIBRERÍAS
//Ethernet Shield
#include<SPI.h>
#include<Ethernet.h>
//Capacitive Soil Moinsture Sensor v1.2
#include <Wire.h>
//DS18B20
#include <OneWire.h>
#include <DallasTemperature.h>

//PIN SENSORES
const int pinCap = 0;
float varCap;

const int pinDS18B20 = 2;
OneWire oneWireObjeto(pinDS18B20);
DallasTemperature sensorDS18B20(&oneWireObjeto);

const int pinLDR = 1;
int varLDR;

const int Trigger = 7;
const int Echo = 8;

//ACTUADORES
//Ventilador
//NO SE UTILIZÓ RELÉ, DE TODAS MANERAS FUNCIONA CON TRANSISTOR (activa el motor a su máxima potencia)
const int rele1 = 3;
//Bomba de agua
//NO SE UTILIZÓ RELÉ, DE TODAS MANERAS FUNCIONA CON TRANSISTOR (activa el motor a su máxima potencia)
const int rele2 = 5;
//Variables tonos speaker
float sinVal;
int toneVal;

//Conexión server/arduino
byte mac[] = {0xDE, 0xAD, 0xBE, 0xEF, 0xFF, 0xEE};
byte ip[] = {192,168,0,101};
byte server[] = {192,168,0,100};
EthernetClient client;

void setup(){
  Ethernet.begin(mac, ip);
  Serial.begin(9600);
  pinMode(Trigger, OUTPUT);
  pinMode(Echo, INPUT);
  digitalWrite(Trigger, LOW);
  pinMode(4, OUTPUT);
  pinMode(rele1, OUTPUT);
  pinMode(rele2, OUTPUT);
//  delay(1000);
}

void loop(){
  varCap = analogRead(pinCap);
  Serial.print("HUMEDAD SUELO: ");
  Serial.println(varCap);
  //ACTIVACIÓN DE ACTUADORES MEDIANTE CLASES
  if(varCap >= 560){
    activaBomba();
  }
  else if(varCap <= 559){
    apagaBomba();
  }

  sensorDS18B20.requestTemperatures();
  Serial.print("TEMPERATURA AMBIENTE: ");
  Serial.println(sensorDS18B20.getTempCByIndex(0));
  //ACTIVACIÓN DE ACTUADORES MEDIANTE CLASES
  if(sensorDS18B20.getTempCByIndex(0) >= 27){
    activaVentilador();
  }
  else if(sensorDS18B20.getTempCByIndex(0) <= 26){
    apagaVentilador();
  }

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
  //ACTIVACIÓN DE ACTUADORES MEDIANTE CLASES
  if(d >= 30){
    activaSpeaker();
  }
  else if(d <= 29){
    apagaSpeaker();
  }

  //ENVÍA DATOS SENSOR CAPACITIVO A "datos.php" mediante variable GET
  if(client.connect(server,80)>0){
    Serial.println("conexión establecida");
    client.print("GET /Invernadero/datos.php?varCap=");
    client.print(varCap);
    client.println(" HTTP/1.0");
    client.println("User-Agent: Arduino 1.0");
    client.println();
    Serial.println("Conectado"); 
  }
  //ENVÍA DATOS SENSOR CAPACITIVO A "datos.php" mediante variable GET
  if(client.connect(server,80)>0){
    Serial.println("conexión establecida");
    client.print("GET /Invernadero/datos.php?sensorDS18B20=");
    client.print(sensorDS18B20.getTempCByIndex(0));
    client.println(" HTTP/1.0");
    client.println("User-Agent: Arduino 1.0");
    client.println();
    Serial.println("Conectado"); 
  }
  //ENVÍA DATOS SENSOR CAPACITIVO A "datos.php" mediante variable GET
  if(client.connect(server,80)>0){
    Serial.println("conexión establecida");
    client.print("GET /Invernadero/datos.php?varLDR=");
    client.print(varLDR);
    client.println(" HTTP/1.0");
    client.println("User-Agent: Arduino 1.0");
    client.println();
    Serial.println("Conectado"); 
  }
  //ENVÍA DATOS SENSOR CAPACITIVO A "datos.php" mediante variable GET
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

//CLASES ACTIVACIÓN ACTUADORES
void activaVentilador(){
  digitalWrite(rele1, HIGH);
}

void apagaVentilador(){
  digitalWrite(rele1, LOW);
}

void activaBomba(){
  digitalWrite(rele2, HIGH);
}

void apagaBomba(){
  digitalWrite(rele2, LOW);
}

void activaSpeaker(){
  //Cálculo Hz
  for(int x=0; x<180; x++){
    sinVal = (sin(x*(3.1412/180)));
    toneVal = 2000+(int(sinVal*1000));
    tone(4, toneVal);
    delay(2);
  }
}

void apagaSpeaker(){
  noTone(4);
  delay(2);
}
