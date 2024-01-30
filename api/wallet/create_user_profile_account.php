<?php
/**
 * File: example.php
 * Description: An example illustrating the input and output of a function.
 */

/*
 * Input:
 * ------------------------------------------------------
 * {
 *   "firstName": "Test",
 *   "lastName": "Apis",
 *   "identityNumber": "3832123",
 *   "identityType": "NationalId",
 *   "phoneNumber": "0719399210",
 *   "gender": "Male",
 *   "dateOfBirth": "1997-08-23T13:29:55.295Z",
 *   "county": "Nairobi",
 *   "physicalAddress": "Ruai",
 *   "email": "kimatrocious@gmail.com"
 * }
 * GET
 * Authorization: Bearer Token
 * ------------------------------------------------------
 */

/*
 * Output:
 * {
 *     "id": "52e848fb-2b7c-484f-84c9-08db41d709be",
 *     "firstName": "Chanuka",
 *     "lastName": "Fintech",
 *     "identityNumber": "254719585416",
 *     "identityType": "NationalId",
 *     "phoneNumber": "254719585416",
 *     "gender": "Male",
 *     "dateOfBirth": "1989-12-31T21:00:00",
 *     "county": "Kenya",
 *     "physicalAddress": "Nairobi",
 *     "modifiedBy": null,
 *     "email": null,
 *     "modifiedDate": null,
 *     "createdBy": null,
 *     "createdDate": "2023-04-21T01:40:04.0125822+03:00",
 *     "isActive": true
 * }
 */


 $requiredFields = ["firstName", "lastName", "identityNumber", "identityType", "phoneNumber", "gender", "dateOfBirth", "county", "physicalAddress", "email"];

 