int dividir(int datoUno, int datoDos, float *resultado)
{
    float aux;
    int retorno;
    retorno=0;
    if(datoDos!=0)
    {
        aux=(float)datoUno/datoDos;
        *resultado=aux;
        retorno=1;
    }
    return retorno;

}
/*int pedirEdad(int *edad)
{
    int aux;
    int retorno;
    retorno=0;
    printf("Ingrese su edad: ");

    if(scanf("%d",&aux)==1)
    {
        if(aux>0 && aux<150)
        {
            *edad=aux;
            retorno=1;
          }

    }
    return retorno;
}
/*void verSiAnda(void)
{
    printf("funciona");
}
int cambiarValor(int dato)
{
   dato=0;
   printf("\n lugar valor %d",&dato);
}
int cambiarReferencia(int *dato)
{
   *dato=0;
    printf("\n lugar referencia %d",&*dato);
}*/
