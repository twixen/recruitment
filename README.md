Zadanie rekrutacyjne
====================

Stwórz prosty, obiektowy mechanizm koszyka zakupowego. W tym celu musisz napisać klasy `Product`, `Cart` oraz `Item`.
Każdy produkt ma swoją nazwę i cenę. Podczas dodawania produktu do koszyka podajemy liczbę sztuk (ang. _quantity_).

Niektóre produkty mają zdefiniowaną minimalną liczbę sztuk, jaką można zamówić.
Jeżeli użytkownik wybierze mniejszą liczbę, to należy rzucić wyjątek.
Domyślnie dla każdego produktu minimalna liczba zamawianych sztuk powinna wynosić 1.

W katalogu `tests` znajdują się testy, które określają strukturę produktu, koszyka i pozycji w koszyku.
Przygotuj implementację koszyka w taki sposób, aby testy się powiodły.
Pilnuj formatowania zgodnego z PSR-2, aby zaakceptował je PHP Code Sniffer.

Koszyk powinien operować na groszach, aby uniknąć błędów operacji zmiennoprzecinkowych.

Aby uprościć zadanie, nie przejmuj się przechowywaniem koszyka w sesji ani w bazie danych.
Nie musisz pisać kontrolerów ani widoków.
Zadanie polega tylko na wykonaniu modelu. 
