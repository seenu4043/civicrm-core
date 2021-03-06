<?php
/*
+--------------------------------------------------------------------+
| CiviCRM version 4.7                                                |
+--------------------------------------------------------------------+
| Copyright CiviCRM LLC (c) 2004-2018                                |
+--------------------------------------------------------------------+
| This file is a part of CiviCRM.                                    |
|                                                                    |
| CiviCRM is free software; you can copy, modify, and distribute it  |
| under the terms of the GNU Affero General Public License           |
| Version 3, 19 November 2007 and the CiviCRM Licensing Exception.   |
|                                                                    |
| CiviCRM is distributed in the hope that it will be useful, but     |
| WITHOUT ANY WARRANTY; without even the implied warranty of         |
| MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.               |
| See the GNU Affero General Public License for more details.        |
|                                                                    |
| You should have received a copy of the GNU Affero General Public   |
| License and the CiviCRM Licensing Exception along                  |
| with this program; if not, contact CiviCRM LLC                     |
| at info[AT]civicrm[DOT]org. If you have questions about the        |
| GNU Affero General Public License or the licensing of CiviCRM,     |
| see the CiviCRM license FAQ at http://civicrm.org/licensing        |
+--------------------------------------------------------------------+
*/
/**
 *
 * @package CRM
 * @copyright CiviCRM LLC (c) 2004-2018
 * $Id$
 *
 */
require_once 'CRM/Core/DAO.php';
require_once 'CRM/Utils/Type.php';

/**
 * Class CRM_Upgrade_Snapshot_V4p2_Price_DAO_FieldValue
 */
class CRM_Upgrade_Snapshot_V4p2_Price_DAO_FieldValue extends CRM_Core_DAO {
  /**
   * static instance to hold the table name
   *
   * @var string
   */
  static $_tableName = 'civicrm_price_field_value';
  /**
   * static instance to hold the field values
   *
   * @var array
   */
  static $_fields = NULL;
  /**
   * static instance to hold the FK relationships
   *
   * @var string
   */
  static $_links = NULL;
  /**
   * static instance to hold the values that can
   * be imported
   *
   * @var array
   */
  static $_import = NULL;
  /**
   * static instance to hold the values that can
   * be exported
   *
   * @var array
   */
  static $_export = NULL;
  /**
   * static value to see if we should log any modifications to
   * this table in the civicrm_log table
   *
   * @var boolean
   */
  static $_log = FALSE;
  /**
   * Price Field Value
   *
   * @var int unsigned
   */
  public $id;
  /**
   * FK to civicrm_price_field
   *
   * @var int unsigned
   */
  public $price_field_id;
  /**
   * Price field option name
   *
   * @var string
   */
  public $name;
  /**
   * Price field option label
   *
   * @var string
   */
  public $label;
  /**
   * >Price field option description.
   *
   * @var text
   */
  public $description;
  /**
   * Price field option amount
   *
   * @var string
   */
  public $amount;
  /**
   * Number of participants per field option
   *
   * @var int unsigned
   */
  public $count;
  /**
   * Max number of participants per field options
   *
   * @var int unsigned
   */
  public $max_value;
  /**
   * Order in which the field options should appear
   *
   * @var int
   */
  public $weight;
  /**
   * FK to Membership Type
   *
   * @var int unsigned
   */
  public $membership_type_id;
  /**
   * Is this default price field option
   *
   * @var boolean
   */
  public $is_default;
  /**
   * Is this price field value active
   *
   * @var boolean
   */
  public $is_active;

  /**
   * Class constructor.
   *
   * @return \CRM_Upgrade_Snapshot_V4p2_Price_DAO_FieldValue
   */
  public function __construct() {
    $this->__table = 'civicrm_price_field_value';
    parent::__construct();
  }

  /**
   * Return foreign links.
   *
   * @return array
   */
  public function links() {
    if (!(self::$_links)) {
      self::$_links = array(
        'price_field_id' => 'civicrm_price_field:id',
        'membership_type_id' => 'civicrm_membership_type:id',
      );
    }
    return self::$_links;
  }

  /**
   * Returns all the column names of this table.
   *
   * @return array
   */
  public static function &fields() {
    if (!(self::$_fields)) {
      self::$_fields = array(
        'id' => array(
          'name' => 'id',
          'type' => CRM_Utils_Type::T_INT,
          'required' => TRUE,
        ),
        'price_field_id' => array(
          'name' => 'price_field_id',
          'type' => CRM_Utils_Type::T_INT,
          'required' => TRUE,
          'FKClassName' => 'Snapshot_v4p2_Price_DAO_Field',
        ),
        'name' => array(
          'name' => 'name',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Name'),
          'maxlength' => 255,
          'size' => CRM_Utils_Type::HUGE,
        ),
        'label' => array(
          'name' => 'label',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Label'),
          'maxlength' => 255,
          'size' => CRM_Utils_Type::HUGE,
        ),
        'description' => array(
          'name' => 'description',
          'type' => CRM_Utils_Type::T_TEXT,
          'title' => ts('Description'),
          'rows' => 2,
          'cols' => 60,
          'default' => 'UL',
        ),
        'amount' => array(
          'name' => 'amount',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Amount'),
          'required' => TRUE,
          'maxlength' => 512,
          'size' => CRM_Utils_Type::HUGE,
        ),
        'count' => array(
          'name' => 'count',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Count'),
          'default' => 'UL',
        ),
        'max_value' => array(
          'name' => 'max_value',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Max Value'),
          'default' => 'UL',
        ),
        'weight' => array(
          'name' => 'weight',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Weight'),
          'default' => '',
        ),
        'membership_type_id' => array(
          'name' => 'membership_type_id',
          'type' => CRM_Utils_Type::T_INT,
          'default' => 'UL',
          'FKClassName' => 'CRM_Member_DAO_MembershipType',
        ),
        'is_default' => array(
          'name' => 'is_default',
          'type' => CRM_Utils_Type::T_BOOLEAN,
        ),
        'is_active' => array(
          'name' => 'is_active',
          'type' => CRM_Utils_Type::T_BOOLEAN,
          'default' => '',
        ),
      );
    }
    return self::$_fields;
  }

  /**
   * returns the names of this table.
   *
   * @return string
   */
  public static function getTableName() {
    return CRM_Core_DAO::getLocaleTableName(self::$_tableName);
  }

  /**
   * returns if this table needs to be logged.
   *
   * @return boolean
   */
  public function getLog() {
    return self::$_log;
  }

  /**
   * Returns the list of fields that can be imported.
   *
   * @param bool $prefix
   *
   * @return array
   */
  static function &import($prefix = FALSE) {
    if (!(self::$_import)) {
      self::$_import = array();
      $fields = self::fields();
      foreach ($fields as $name => $field) {
        if (!empty($field['import'])) {
          if ($prefix) {
            self::$_import['price_field_value'] = &$fields[$name];
          }
          else {
            self::$_import[$name] = &$fields[$name];
          }
        }
      }
    }
    return self::$_import;
  }

  /**
   * Returns the list of fields that can be exported.
   *
   * @param bool $prefix
   *
   * @return array
   */
  static function &export($prefix = FALSE) {
    if (!(self::$_export)) {
      self::$_export = array();
      $fields = self::fields();
      foreach ($fields as $name => $field) {
        if (!empty($field['export'])) {
          if ($prefix) {
            self::$_export['price_field_value'] = &$fields[$name];
          }
          else {
            self::$_export[$name] = &$fields[$name];
          }
        }
      }
    }
    return self::$_export;
  }
}
