<?php
/**
 * File: Create User Profile
 * Description: Creates a user profile and returns the output.
 */

/*
 * Input:
 * ------------------------------------------------------
 * {
 *   "currency": "KES",
 *   "phoneNumber": "0719399210",
 *   "accountNo": "1000127"
 * }
 * GET
 * Authorization: Bearer Token
 * ------------------------------------------------------
 *
 * Output:
 * {
 *     "id": "73940b9b-5f88-4fb9-9d09-ea4b8eb12f3d",
 *     "accountNo": "1000423",
 *     "name": "Test Apis",
 *     "description": null,
 *     "currentBalance": 0,
 *     "bookBalance": 0,
 *     "currency": "Kes",
 *     "accountType": "Individual",
 *     "isActive": true,
 *     "isDefault": false,
 *     "profileId": "d62d29ea-90b8-4302-4234-08db7a24474f",
 *     "profile": {
 *         "firstName": "Test",
 *         "lastName": "Apis",
 *         "identityNumber": "3832123",
 *         "identityType": "NationalId",
 *         "phoneNumber": "254719399210",
 *         "gender": "Male",
 *         "dateOfBirth": "1997-08-23T13:29:55.295",
 *         "county": "Nairobi",
 *         "physicalAddress": "Ruai",
 *         "modifiedBy": null,
 *         "email": "kimatrocious@gmail.com",
 *         "modifiedDate": null,
 *         "createdBy": null,
 *         "createdDate": "2023-07-01T14:14:03.6678712+03:00",
 *         "isActive": true
 *     },
 *     "tenantId": "52e848fb-2b7c-484f-84c9-08db41d709be",
 *     "tenant": {
 *         "id": "52e848fb-2b7c-484f-84c9-08db41d709be",
 *         "firstName": "Chanuka",
 *         "lastName": "Fintech",
 *         "identityNumber": "254719585416",
 *         "identityType": "NationalId",
 *         "phoneNumber": "254719585416",
 *         "gender": "Male",
 *         "dateOfBirth": "1989-12-31T21:00:00",
 *         "county": "Kenya",
 *         "physicalAddress": "Nairobi",
 *         "modifiedBy": null,
 *         "email": null,
 *         "modifiedDate": null,
 *         "createdBy": null,
 *         "createdDate": "2023-04-21T01:40:04.0125822+03:00",
 *         "isActive": true
 *     },
 *     "modifiedBy": null,
 *     "modifiedDate": null,
 *     "createdBy": "850eeffb-187c-488f-b94f-af85a22ab669",
 *     "createdDate": "2023-07-01T14:59:21.2695931+03:00"
 * }
 */
