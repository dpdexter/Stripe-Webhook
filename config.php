<?php
// An array of all available hooks in the /webhooks directory. 
// It makes sense to load up this array dynamically based on the 
// file name structure. But lets just do it this way for now. 

$webhooks = array(
					"charge" => array(
										"charge.disputed",
										"charge.failed",
										"charge.refunded",
										"charge.succeeded"
									),
					"coupon" => array(
										"coupon.created",
										"coupon.deleted"
									),
					"customer" => array(
										"customer.created",
										"customer.deleted",
										"customer.discount.created",
										"customer.discount.deleted",
										"customer.discount.updated",
										"customer.subscription.created",
										"customer.subscription.deleted",
										"customer.subscription.trial_will_end",
										"customer.subscription.updated",
										"customer.updated"
									),
					"invoice" => array(
										"invoice.created",
										"invoice.payment_failed",
										"invoice.payment_succeeded",
										"invoice.updated"
									),
					"invoiceitem" => array(
										"invoiceitem.created",
										"invoiceitem.deleted",
										"invoiceitem.updated"
									),
					"plan" => array(
										"plan.created",
										"plan.deleted",
										"plan.updated",
									),
					"transfer" => array(
										"transfer.created",
										"transfer.failed"
										)
				);