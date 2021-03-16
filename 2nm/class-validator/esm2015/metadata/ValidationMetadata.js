/**
 * This metadata contains validation rules.
 */
export class ValidationMetadata {
    // -------------------------------------------------------------------------
    // Constructor
    // -------------------------------------------------------------------------
    constructor(args) {
        /**
         * Validation groups used for this validation.
         */
        this.groups = [];
        /**
         * Indicates if validation must be performed always, no matter of validation groups used.
         */
        this.always = false;
        /**
         * Specifies if validated value is an array and each of its item must be validated.
         */
        this.each = false;
        /*
         * A transient set of data passed through to the validation result for response mapping
         */
        this.context = undefined;
        this.type = args.type;
        this.target = args.target;
        this.propertyName = args.propertyName;
        this.constraints = args.constraints;
        this.constraintCls = args.constraintCls;
        this.validationTypeOptions = args.validationTypeOptions;
        if (args.validationOptions) {
            this.message = args.validationOptions.message;
            this.groups = args.validationOptions.groups;
            this.always = args.validationOptions.always;
            this.each = args.validationOptions.each;
            this.context = args.validationOptions.context;
        }
    }
}

//# sourceMappingURL=ValidationMetadata.js.map
