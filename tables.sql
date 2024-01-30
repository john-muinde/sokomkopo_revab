CREATE TABLE users (
    id VARCHAR(36) PRIMARY KEY,
    accountNo VARCHAR(255),
    name VARCHAR(255),
    description VARCHAR(255) NULL,
    currentBalance DECIMAL(18, 2),
    bookBalance DECIMAL(18, 2),
    currency VARCHAR(255),
    accountType VARCHAR(255),
    isActive BOOLEAN,
    isDefault BOOLEAN,
    profileId VARCHAR(36),
    tenantId VARCHAR(36),
    modifiedBy VARCHAR(36) NULL,
    modifiedDate DATETIME NULL,
    createdBy VARCHAR(36),
    createdDate DATETIME
);


CREATE TABLE profiles (
    id VARCHAR(36) PRIMARY KEY,
    firstName VARCHAR(255),
    lastName VARCHAR(255),
    identityNumber VARCHAR(255),
    identityType VARCHAR(255),
    phoneNumber VARCHAR(255),
    gender VARCHAR(255),
    dateOfBirth DATETIME,
    county VARCHAR(255),
    physicalAddress VARCHAR(255),
    modifiedBy VARCHAR(36) NULL,
    email VARCHAR(255) NULL,
    modifiedDate DATETIME NULL,
    createdBy VARCHAR(36) NULL,
    createdDate DATETIME,
    isActive BOOLEAN
);


CREATE TABLE tenants (
    id VARCHAR(36) PRIMARY KEY,
    firstName VARCHAR(255),
    lastName VARCHAR(255),
    identityNumber VARCHAR(255),
    identityType VARCHAR(255),
    phoneNumber VARCHAR(255),
    gender VARCHAR(255),
    dateOfBirth DATETIME,
    county VARCHAR(255),
    physicalAddress VARCHAR(255),
    modifiedBy VARCHAR(36) NULL,
    email VARCHAR(255) NULL,
    modifiedDate DATETIME NULL,
    createdBy VARCHAR(36) NULL,
    createdDate DATETIME,
    isActive BOOLEAN
);


