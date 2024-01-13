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


CREATE TABLE category (
    CategoryID INT PRIMARY KEY,
    CategoryName VARCHAR(255),
);

CREATE TABLE product (
    ProductID INT PRIMARY KEY,
    AgentID INT,
    CategoryID INT,
    ProductName VARCHAR(255),
    ProductDescription VARCHAR(255),
    ProductPrice DECIMAL,
    ProductCost DECIMAL,
    ProductWeight DECIMAL,
    ProductStock INT,
    FOREIGN KEY (CategoryID) REFERENCES category(CategoryID),
    FOREIGN KEY (AgentID) REFERENCES agent(AgentID),
    FOREIGN KEY (SupplierID) REFERENCES supplier(SupplierID),
);

CREATE TABLE orders (
    OrderID INT PRIMARY KEY,
    AgentID INT,
    ProductID INT,
    OrderQuantity INT,
    OrderStatus VARCHAR(255),
    OrderDate DATE,
    ShippedDate DATE,
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
