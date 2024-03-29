CREATE TABLE supplier (
    SupplierID INT PRIMARY KEY,
    SupplierName VARCHAR(255),
    SupplierPassword VARCHAR(255),
    SupplierEmail VARCHAR(255)
);

CREATE TABLE agent (
    AgentID INT PRIMARY KEY,
    SupplierID INT,
    AgentName VARCHAR(255),
    AgentPassword VARCHAR(255),
    AgentEmail VARCHAR(255),
    FOREIGN KEY (SupplierID) REFERENCES supplier(SupplierID)
);

CREATE TABLE product (
    ProductID INT PRIMARY KEY,
    AgentID INT,
    OrderID INT,
    SupplierID INT,
    ProductName VARCHAR(255),
    ProductPrice DECIMAL,
    ProductCost DECIMAL,
    ProductStock INT,
    ProductQuantity INT,
    FOREIGN KEY (AgentID) REFERENCES agent(AgentID),
    FOREIGN KEY (SupplierID) REFERENCES supplier(SupplierID),
    FOREIGN KEY (OrderID) REFERENCES orders(OrderID)
);

CREATE TABLE orders (
    OrderID INT AUTO_INCREMENT PRIMARY KEY,
    AgentID INT,
    ProductID INT,
    OrderQuantity INT,
    OrderCustomerName VARCHAR(255),
    OrderCustomerAddress VARCHAR(255),
    OrderCustomerContactNumber VARCHAR(255),
    OrderStatus VARCHAR(255),
    FOREIGN KEY (AgentID) REFERENCES agent(AgentID),
    FOREIGN KEY (ProductID) REFERENCES product(ProductID)
);

CREATE TABLE sales (
    SalesID INT PRIMARY KEY,
    OrderID INT,
    SupplierID INT,
    AgentID INT,
    ProductID INT,
    OrderQuantity INT,
    SalesAmount INT,
    SaleDate DATE,
    FOREIGN KEY (OrderID) REFERENCES orders(OrderID),
    FOREIGN KEY (SupplierID) REFERENCES supplier(SupplierID),
    FOREIGN KEY (AgentID) REFERENCES agent(AgentID),
    FOREIGN KEY (ProductID) REFERENCES product(ProductID)
);


CREATE TABLE language (
    LanguageID INT PRIMARY KEY,
    LanguageCode VARCHAR(255),
    LanguageName VARCHAR(255)
);

CREATE TABLE translation (
    TranslationID INT PRIMARY KEY,
    LanguageID INT,
    TranslationKey VARCHAR(255),
    TranslationValue VARCHAR(255),
    FOREIGN KEY (LanguageID) REFERENCES language(LanguageID)
);
