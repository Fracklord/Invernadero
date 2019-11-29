//Capacitive Soil Moinsture Sensor v1.2
#include <SPI.h>
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

void setup(){
  Serial.begin(9600);
  sensorDS18B20.begin(); 
  pinMode(Trigger, OUTPUT);
  pinMode(Echo, INPUT);
  digitalWrite(Trigger, LOW);
}

void loop(){
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

  Serial.println("----------------------");
  
  delay(1000);
}
