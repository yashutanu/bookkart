CREATE DATABASE YummPizza;

CREATE TABLE YummPizza.OrderDetails(
	id SERIAL PRIMARY KEY NOT NULL,
	customername TEXT NOT NULL,
	contact INT,
	pizzasize VARCHAR(10)	NOT NULL,
	crust VARCHAR(15) NOT NULL,
	toppings VARCHAR(100),
	quantity INT NOT NULL,
	amount INT NOT NULL
);

