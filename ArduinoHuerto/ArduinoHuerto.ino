//LIBRERÍAS SENSOR CAPACITIVO
#include<SPI.h>
#include<Ethernet.h>
//Capacitive Soil Moinsture Sensor v1.2
#include <Wire.h>
//DS18B20
#include <OneWire.h>
#include <DallasTemperature.h>

//SENSORES
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
const int Vent = 3;
int PWMVent;

const int Bomb = 5;
int PMWBomb;

float sinVal;
int toneVal;

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
  pinMode(Vent, OUTPUT);
  pinMode(4, OUTPUT);
//  delay(1000);
}

void loop(void){
  varCap = analogRead(pinCap);
  Serial.print("HUMEDAD SUELO: ");
  Serial.println(varCap);
  if(varCap >= 560){
    PMWBomb = 255;
    if(PMWBomb = 255){
      analogWrite(Vent, PMWBomb);
    }
  }
  else if(varCap <= 560){
    PMWBomb = 0;
    if(PMWBomb = 0){
      analogWrite(Vent, PMWBomb);
    }
  }

  sensorDS18B20.requestTemperatures();
  Serial.print("TEMPERATURA AMBIENTE: ");
  Serial.println(sensorDS18B20.getTempCByIndex(0));

  if(sensorDS18B20.getTempCByIndex(0) > 28){
    PWMVent = 255;
    if(PWMVent = 255){
      analogWrite(Vent, PWMVent);
    }
  }
  else if(sensorDS18B20.getTempCByIndex(0) <= 28){
    PWMVent = 0;
    if(PWMVent = 0){
      analogWrite(Vent, PWMVent);
    }
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

  if(d >= 18){
    for(int x=0; x<180; x++){
      sinVal = (sin(x*(3.1412/180)));
      toneVal = 2000+(int(sinVal*1000));
      tone(4, toneVal);
      delay(2);
    }
  }
  else if(d <= 17){
    noTone(4);
    delay(2);
  }


//Funciona todo
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
   
