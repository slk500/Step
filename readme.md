Create simple webpage that tells the visitor over which part of the world International Space Station (ISS) is flying right now. E.g. it could display a message: "Currently ISS is over Kgalagadi North District, Botswana", but details are up to you.

Remarks:

* http://wheretheiss.at/w/developer is API that will give you information about ISS position

* You can use Google's Geocoding API to translate location to human readable addresshttps://developers.google.com/maps/documentation/geocoding/intro#ReverseGeocoding

* PHP (but no frameworks) or React

* OOP and MVC (or similar pattern) is encouraged

* Please write tests and implement at least one design pattern (please explain why you chose particular pattern and what are pros and cons of his choice)

Implemented design pattern - Dependency Injection:

 pros:
- decreases coupling between a class and its dependency
- it's easier to test classes
- centralize configuration for app
- encapsulation
- all dependencies are visible at initialization of object

cons:
- more boilerplate code

I have chosen DI because it's fundamental pattern to write solid, clean code and use TTD. 