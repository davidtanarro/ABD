maximo(X,Y,X):- X >= Y.
maximo(X,Y,Y):- Y > X.

factorial(0,1).
factorial(X,Y):- X>0, X1 is X-1, factorial(X1,Y1), Y is X*Y1.

%Todos los elementos menores que el parámetro:
lista_acotada([],_).
lista_acotada([X|L],N):- X<N, lista_acotada(L,N).

%Máximo de una lista de números:
max_lista([X],X).
max_lista([X1,X2|L],Y):-maximo(X1,X2,X3), max_lista([X3|L],Y).

%Suma de los elementos de una lista:
suma([],0).
suma([X|L],Y):- suma(L,Y1), Y is X+Y1.

%Lista ordenada:
ordenada([_]).
ordenada([X,Y|L]):- X =< Y, ordenada([Y|L]).