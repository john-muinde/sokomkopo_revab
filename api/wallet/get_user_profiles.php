<?php
/**
 * File: User Profile List
 * Description: Retrieves a list of user profiles and their details.
 * URL: /profiles
 */

/*
 * Input:
 * ------------------------------------------------------
 * None
 * GET
 * Authorization: Bearer Token
 * ------------------------------------------------------
 *
 * Output:
 * {
 *     "pageIndex": 1,
 *     "pageSize": 10,
 *     "count": 2,
 *     "data": [
 *         {
 *             "id": "28db7d60-2028-4f8b-a7c1-30011d78593b",
 *             "accountNo": "1000127",
 *             "name": "SOKO MKOPO",
 *             "description": "Saving",
 *             "currentBalance": 0,
 *             "bookBalance": 0,
 *             "currency": "Kes",
 *             "accountType": "Whitelabel",
 *             "isActive": true,
 *             "isDefault": false,
 *             "profile": {
 *                 "id": "52e848fb-2b7c-484f-84c9-08db41d709be",
 *                 "firstName": "Chanuka",
 *                 "lastName": "Fintech",
 *                 "identityNumber": "254719585416",
 *                 "identityType": "NationalId",
 *                 "phoneNumber": "254719585416",
 *                 "gender": "Male",
 *                 "dateOfBirth": "1989-12-31T21:00:00",
 *                 "county": "Nairobi",
 *                 "physicalAddress": "Nairobi",
 *                 "modifiedBy": null,
 *                 "email": null,
 *                 "modifiedDate": null,
 *                 "createdBy": null,
 *                 "createdDate": "2023-04-21T01:40:04.0125822+03:00",
 *                 "isActive": true
 *             },
 *             "tenant": {
 *                 "firstName": "Jambopay",
 *                 "lastName": "LTD",
 *                 "identityNumber": "12345678",
 *                 "identityType": "NationalId",
 *                 "phoneNumber": "254790126166",
 *                 "gender": "Male",
 *                 "dateOfBirth": "2009-01-01T00:00:00",
 *                 "county": "Nairobi",
 *                 "physicalAddress": "View Park Towers",
 *                 "modifiedBy": "41cdab6c-2a3c-4fe4-a649-ea1d0d795639",
 *                 "email": null,
 *                 "modifiedDate": "2023-04-27T13:37:42.0591014+03:00",
 *                 "createdBy": null,
 *                 "createdDate": "2022-10-27T15:10:03.9295882+03:00",
 *                 "isActive": true
 *             },
 *             "modifiedBy": null,
 *             "modifiedDate": null,
 *             "createdBy": null,
 *             "createdDate": "2023-04-21T01:44:04.5820277+03:00"
 *         },
 *         {
 *             "id": "5692e2e4-89d8-4c6f-b9f9-ca033110d174",
 *             "accountNo": "1000126",
 *             "name": "SOKO MKOPO",
 *             "description": "Saving",
 *             "currentBalance": 0,
 *             "bookBalance": 0,
 *             "currency": "Kes",
 *             "accountType": "Individual",
 *             "isActive": true,
 *             "isDefault": false,
 *             "profile": {
 *                 "id": "52e848fb-2b7c-484f-84c9-08db41d709be",
 *                 "firstName": "Chanuka",
 *                 "lastName": "Fintech",
 *                 "identityNumber": "254719585416",
 *                 "identityType": "NationalId",
 *                 "phoneNumber": "254719585416",
 *                 "gender": "Male",
 *                 "dateOfBirth": "1989-12-31T21:00:00",
 *                 "county": "Nairobi",
 *                 "physicalAddress": "Nairobi",
 *                 "modifiedBy": null,
 *                 "email": null,
 *                 "modifiedDate": null,
 *                 "createdBy": null,
 *                 "createdDate": "2023-04-21T01:40:04.0125822+03:00",
 *                 "isActive": true
 *             },
 *             "tenant": {
 *                 "firstName": "Jambopay",
 *                 "lastName": "LTD",
 *                 "identityNumber": "12345678",
 *                 "identityType": "NationalId",
 *                 "phoneNumber": "254790126166",
 *                 "gender": "Male",
 *                 "dateOfBirth": "2009-01-01T00:00:00",
 *                 "county": "Nairobi",
 *                 "physicalAddress": "View Park Towers",
 *                 "modifiedBy": "41cdab6c-2a3c-4fe4-a649-ea1d0d795639",
 *                 "email": null,
 *                 "modifiedDate": "2023-04-27T13:37:42.0591014+03:00",
 *                 "createdBy": null,
 *                 "createdDate": "2022-10-27T15:10:03.9295882+03:00",
 *                 "isActive": true
 *             },
 *             "modifiedBy": null,
 *             "modifiedDate": null,
 *             "createdBy": null,
 *             "createdDate": "2023-04-21T01:40:16.512895+03:00"
 *         }
 *     ]
 * }
 */
