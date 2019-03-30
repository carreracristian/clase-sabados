#include <stdio.h>
#include <stdlib.h>
int pedirNumero(void);
float sacarPromedio(int suma,int cantidad);
int sacarAprobacion(int notaMinima, int nota);
int main()
{
    int elNumeroIngresado;
    float promedio;
    float promedioNoAprobados;
    float promedioTotal;
    int cantidadAprobados;
    int estaAprobado;
    int sumaTotal;

    elNumeroIngresado=pedirNumero();
    printf("\nEl numero ingresado fue:%d", elNumeroIngresado);
    promedio = sacarPromedio(94,5);
    printf("\nEl promedio fue: %f",promedio);
    estaAprobado=sacarAprobacion(6,elNumeroIngresado);
    if(estaAprobado==1)
    {
        printf("\naprobo");
    }
    else{
        printf("\nno aprobo");
    }

}
int pedirNumero(void)
{
    int miNumero;
    int numAlumnos;
    numAlumnos=0;


    while(numAlumnos<5)
    {
         printf("Ingrese la nota: ");
         scanf("%d",&miNumero);

        while(miNumero<0 || miNumero>10)
            {
                printf("Reingrese el numero: ");
                scanf("%d", &miNumero);
            }
        numAlumnos++;
    }
}
float sacarPromedio(int suma, int cantidad)
{
   float retorno;
   retorno=(float)suma/cantidad;
   return retorno;

}
int sacarAprobacion(int notaMinima, int nota)
{
    int retorno;
    int sumaAprobados;
    int sumaNoAprobador;
    sumaNoAprobador=0;
    sumaAprobados=0;
    if(nota>=notaMinima)
    {
        retorno=1;
        sumaAprobados++;
    }
    else
        {
            retorno=0;
            sumaNoAprobador++;
            sumaNoAprobador=sumaNoAprobador+notaIngresada;
        }
        return retorno;
}
promedioTotal(sumaTotal,i);
promedioNoAprobados
