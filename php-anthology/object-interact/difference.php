<?php


// how to distinguish object A aggregates or composes object B:
//
// if B outlives the death of A, A aggretates B
// if B dies when the A dies, A composes B
//
// Aggregation has the advantage of lower overhead, because a single object will be
// shared by many other objects.
//  Certainly, aggregating your database connection
// class is a good idea; composing it with every object that wants to make a query
// may require you to have multiple connections to your database, which will quickly
// halt your application when your site attracts high levels of traffic
//
// Composition has the advantage of making classes easier to work with from the outside.
//
//
// you know exactly which class has access to the composed object. With aggregation,
// another object sharing the aggregated object may do something to its state that
// “breaks” the object as far as the other classes that use it are concerned.
