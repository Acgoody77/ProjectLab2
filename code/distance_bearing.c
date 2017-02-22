#include <math.h>

double distance(double mov_latitude, double mov_longitude, double cur_latitude, double cur_longitude){
  double earth_radius = 6371e3;
  double delta_latitude = mov_latitude - cur_latitude;
  double delta_longitude = mov_longitude - cur_longitude;
  double a, c, distance;

  a = (sin(delta_latitude/2) * sin(delta_latitude/2)) + (cos(cur_latitude) * cos(mov_latitude) * (sin(delta_longitude/2)*sin(delta_longitude)));
  c = 2 * atan2(sqrt(a), sqrt(1-a));

  distance = earth_radius * c;

  return distance;
}

double bearing(double mov_latitude, double mov_longitude, double cur_latitude, double cur_longitude){
  double delta_longitude = mov_longitude - cur_longitude;
  double theta;

  theta = atan2((sin(delta_longitude) * cos(mov_latitude)), (cos(cur_latitude) * (sin(mov_latitude) - sin(cur_latitude)) * cos(mov_latitude) * cos(delta_longitude)));

  return theta;

}

double decimal_degrees (int degrees, double minuites){

  double decimal;
  int deg = degrees;
  double min = minuites;

  return decimal = (deg + (min/60));
}

double to_radians(double degrees){
  double deg = degrees;
  double rad;
  rad = (deg * M_PI)/180;

  return rad;

}
