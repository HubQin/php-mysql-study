select customers.customerid, customers.name,orders.orderid
from customers left join orders
  -- on customers.customerid = orders.customerid
using (customerid)
where orders.orderid is null
