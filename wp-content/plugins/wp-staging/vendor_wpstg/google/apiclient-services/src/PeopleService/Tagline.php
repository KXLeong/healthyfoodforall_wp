<?php

/*
 * Copyright 2014 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may not
 * use this file except in compliance with the License. You may obtain a copy of
 * the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations under
 * the License.
 */
namespace WPStaging\Vendor\Google\Service\PeopleService;

class Tagline extends \WPStaging\Vendor\Google\Model
{
    protected $metadataType = \WPStaging\Vendor\Google\Service\PeopleService\FieldMetadata::class;
    protected $metadataDataType = '';
    /**
     * @var string
     */
    public $value;
    /**
     * @param FieldMetadata
     */
    public function setMetadata(\WPStaging\Vendor\Google\Service\PeopleService\FieldMetadata $metadata)
    {
        $this->metadata = $metadata;
    }
    /**
     * @return FieldMetadata
     */
    public function getMetadata()
    {
        return $this->metadata;
    }
    /**
     * @param string
     */
    public function setValue($value)
    {
        $this->value = $value;
    }
    /**
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }
}
// Adding a class alias for backwards compatibility with the previous class name.
\class_alias(\WPStaging\Vendor\Google\Service\PeopleService\Tagline::class, 'WPStaging\\Vendor\\Google_Service_PeopleService_Tagline');
