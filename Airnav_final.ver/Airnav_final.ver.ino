
#include <SPI.h>
#include <HttpClient.h>
#include <Ethernet.h>
#include <EthernetClient.h>
#include "DHT.h"

#define DHTPIN 3
#define DHTTYPE DHT11

DHT dht(DHTPIN, DHTTYPE);

String id = "loc_03";
bool alarm;

byte mac[] = {0xDE, 0xAD, 0xBE, 0xEF, 0xFE, 0xED};
byte ip[] = {172, 10, 16, 2};
byte gw[] = {172, 10, 16, 1};
byte subnet[] = {255, 255, 255, 0};

void setup() {
  Serial.begin(9600);
  Ethernet.begin(mac, ip, gw, gw, subnet);
  dht.begin();
}

void loop() {
  EthernetClient client;
  HttpClient http(client);

  float hum = dht.readHumidity();
  float temp = dht.readTemperature();
  if (temp > 25.0) {
    alarm = 1;
  }
  else {
    alarm = 0;
  }
  Serial.println(hum);
  Serial.println(temp);
  String tempt = "/navigasi/get_data.php?id=" + String(id) + "&temp=" + String(temp) + "&hum=" + String(hum) + "&alarm=" + String(alarm);
  http.get("172.10.16.1", tempt.c_str());
  http.stop();
  delay(1000);
}
