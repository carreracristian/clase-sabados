#include <stdio.h>
#include <stdlib.h>
#include "funciones_puntero.h"
/*int cambiarValor(int dato);
int cambiarReferencia(int *dato);*/

int main()
{
    int sePudo;
    float respuesta;

    sePudo=dividir(27,4,&respuesta);

    if(sePudo==1)
    {
        printf("\nLa respuesta es %.2f",respuesta);
    }
    else
    {
        printf("\nNo se puede");
    }
    /*int miEdad;
    int retorno;
    retorno=pedirEdad(&miEdad);

    if(retorno==1)
    {
        printf("Su edad es %d",miEdad);
    }
    else
    {
        printf("No se pudo");
    }*/
    /*cambiarValor(int dato);
    cambiarReferencia(int *dato);*/

    /* verSiAnda();
     int sueldo;
      printf("\n lugar valor %d",&sueldo);
     sueldo=10000;
     cambiarValor(sueldo);
     printf("\nPor valor: %d",sueldo);
     cambiarReferencia(&sueldo);
     printf("\nPor referencia: %d",sueldo);

     return 0;*/
}
/*int cambiarValor(int dato)
{
   dato=0;
}
int cambiarReferencia(int *dato)
{
   *dato=0;
}*/
