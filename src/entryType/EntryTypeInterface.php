<?php

namespace nLogin\entryType;


/**
 * Interface for all OAuth2 Grant Types
 */
interface EntryTypeInterface {

    public function getQuerystringIdentifier();

    public function validateRequest(RequestInterface $request, ResponseInterface $response);

    public function getClientId();

    public function getUserId();

    public function getScope();

    public function createAccessToken(AccessTokenInterface $accessToken, $client_id, $user_id, $scope);
}
