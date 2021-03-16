import { buildMessage, ValidateBy } from "../common/ValidateBy";
import validator from "validator";
export var IS_PORT = "isPort";
/**
 * Check if the string is a valid port number.
 */
export function isPort(value) {
    return typeof value === "string" && validator.isPort(value);
}
/**
 * Check if the string is a valid port number.
 */
export function IsPort(validationOptions) {
    return ValidateBy({
        name: IS_PORT,
        validator: {
            validate: function (value, args) { return isPort(value); },
            defaultMessage: buildMessage(function (eachPrefix) { return eachPrefix + "$property must be a port"; }, validationOptions)
        }
    }, validationOptions);
}

//# sourceMappingURL=IsPort.js.map
