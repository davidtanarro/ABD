maximo([],N).
maximo(L,N):- L=[X|F],maximo(F,N1), N=max(X,N1).