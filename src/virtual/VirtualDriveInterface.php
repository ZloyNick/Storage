<?php

declare(strict_types=1);

namespace ZloyNick\Storage\virtual;

use ZloyNick\Storage\drive\DriveInterface;

/**
 * The virtual drive interface.
 *
 * This interface should be implemented on the basis of a ZloyNick\Storage\file\FileInterface interface and assume
 * the management of a file whose data is in RAM.
 */
interface VirtualDriveInterface extends VirtualObjectInterface, DriveInterface
{

}