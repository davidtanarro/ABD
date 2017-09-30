fact(X,N):- X>0, X1 is X-1, fact(X1,M), N is X*M.
--------------------------------
lista_acotada([],T).
lista_acotada(L,T):- L=[X|Y],X<T,lista_acotada(Y,T).
--------------------
suma([],0).
suma(L,S):- L=[X|Q],.........
-------------------
maximo([],N).
maximo(L,N):- L=[X|F],maximo(F,N1), N=max(X,N1).