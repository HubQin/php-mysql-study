select orders.orderid,orders.amount,orders.date
from customers,orders
where customers.name = 'Julie Smith'
and customers.customerid = orders.customerid;
